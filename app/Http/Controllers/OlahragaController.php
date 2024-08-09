<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Olahraga;

class OlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $olahraga = Olahraga::all();    
        return view('admin.belanja.olahraga.olahraga',compact('nomor','olahraga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.belanja.olahraga.tambaho');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $olahraga = new Olahraga;
        $olahraga->kebutuhan = $request-> kebutuhan;
        $olahraga->penanggungjawab = $request-> penanggungjawab;
        $olahraga->tanggal = $request-> tanggal;
        $olahraga->jumlah = $request-> jumlah;
        $olahraga->realisasi = $request-> realisasi;
        $olahraga->lebihkurang = $request-> lebihkurang;
        $olahraga->save();

        return redirect('olahraga');
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
        $ola = Olahraga::find($id);
        return view('admin.belanja.olahraga.edito',compact('ola'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ola = Olahraga::find($id);
        $ola->kebutuhan = $request-> kebutuhan;
        $ola->penanggungjawab = $request-> penanggungjawab;
        $ola->tanggal = $request-> tanggal;
        $ola->jumlah = $request-> jumlah;
        $ola->realisasi = $request-> realisasi;
        $ola->lebihkurang = $request-> lebihkurang;
        $ola->save();

        return redirect('/olahraga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ola = Olahraga::find($id);
        $ola->delete();

        return redirect('/olahraga');
    }
}
