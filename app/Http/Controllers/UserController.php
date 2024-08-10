<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danadesa;
use App\Models\Pembangunan;
use App\Models\Olahraga;
use App\Models\Bencana;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pd1 = danadesa::all()->count();
        $pd2 = pembangunan::all()->count();
        $pd3 = Olahraga::all()->count();
        $pd4 = Bencana::all()->count();
        return view('user.dashboard', compact('pd1','pd2','pd3','pd4'));
    }

    public function danadesa()
    {
        $nomor = 1;
        $dana = Danadesa::all();  
        return view('user.danadesa', compact('dana','nomor'));
    }
    public function pembangunan()
    {
        $nomor = 1;
        $pembangunan = Pembangunan::all();  
        return view('user.pembangunan', compact('pembangunan','nomor'));
    }
    public function Olahraga()
    {
        $nomor = 1;
        $olahraga = Olahraga::all();  
        return view('user.olahraga', compact('olahraga','nomor'));
    }
    public function Bencana()
    {
        $nomor = 1;
        $bencana = Bencana::all();  
        return view('user.bencana', compact('bencana','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
