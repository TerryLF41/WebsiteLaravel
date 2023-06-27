<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Program_studi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

use DB;
class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request): View
    {
        // dd("index");
        
        $matkuls = Matkul::all();
        return view('matkul.index', compact('matkuls'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $prodis = Program_studi::all();
        return view('matkul.create', compact("prodis"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_matkul' => 'required|string',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'status' => 'required',
            'prodi' => 'required',
        ]);

        Matkul::create([
            'nama_matkul' => $request->input('nama_matkul'),
            'sks' => $request->input('sks'),
            'semester' => $request->input('semester'),
            'status' => $request->input('status'),
            'program_studi_kode_jurusan' => $request->input('prodi')
        ]);
        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $matkul = Matkul::find($id);
        return view('matkul.show', compact('matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $matkul = Matkul::find($id);
        $permission = Permission::get();
        $matkulPermissions = DB::table("matkul_has_permissions")->where("matkul_has_permissions.matkul_id", $id)
            ->pluck('matkul_has_permissions.permission_id', 'matkul_has_permissions.permission_id')
            ->all();

        return view('matkul.edit', compact('matkul', 'permission', 'matkulPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_matkul' => 'required|string',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'status' => 'required',
            'prodi' => 'required',
        ]);

        $matkul = Matkul::find($id);
        $matkul->name = $request->input('name');
        $matkul->save();

        $matkul->syncPermissions($request->input('permission'));

        return redirect()->route('matkul.index')
            ->with('success', 'Matkul updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        DB::table("matkuls")->where('kode_matkul', $id)->delete();
        return redirect()->route('matkul.index')
            ->with('success', 'Matkul deleted successfully');
    }
}
