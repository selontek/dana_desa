<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danadesa;

class DanaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $dana = Danadesa::all();       
        return view('admin.dana_desa.dana',compact('nomor','dana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dana_desa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dana = new Danadesa;
        $dana->sumberdana = $request-> sumberdana;
        $dana->jumlah = $request-> jumlah;
        $dana->tanggal = $request-> tanggal;
        $dana->save();

        return redirect('/admin/dana');

        
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
