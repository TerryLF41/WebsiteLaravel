<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Mk_Tawars;
use App\Models\Program_studi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

use DB;
class Mk_TawarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request): View
    {
        // dd("index");
        
        $mk_Tawars = Mk_tawars::all();
        return view('mk_Tawars.index', compact('mk_Tawars'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mk_Tawars = Mk_tawars::all();
        return view('mk_Tawars.create', compact("mk_Tawars"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        Mk_Tawars::create([
            'hari' => $request->input('hari'),
            'jam' => $request->input('jam'),
        ]);
        return redirect()->route('schedules.index')
            ->with('success', 'Schedule created successfully');
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
    public function edit(String $id): View
    {
        $matkul = Matkul::find($id);

        return view('matkul.edit', compact('matkul'));
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

        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matkul::destroy($id);
        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul Delete successfully');
    }
}
