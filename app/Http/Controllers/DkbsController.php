<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Dkbs;
use App\Models\Program_studi;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

use DB;
class DkbsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request): View
    {
        // dd("index");
        
        $dkbs = Dkbs::all();
        $user = Auth::user();
        return view('dkbs.index', compact('dkbs'));
    }
}
