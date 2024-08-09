<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bencana;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $bencana = Bencana::all();
        return view('admin.belanja.bencana.bencana',compact('nomor','bencana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.belanja.bencana.tambahb');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bencana = new Bencana;
        $bencana->kondisi = $request-> kondisi; 
        $bencana->jumlah = $request-> jumlah;
        $bencana->realisasi = $request-> realisasi;
        $bencana->lebihkurang = $request-> lebihkurang;
        $bencana->save();

        return redirect('bencana');
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
        $ben = Bencana::find($id);
        return view('admin.belanja.bencana.editb',compact('ben'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ben = Bencana::find($id);
        $ben->kondisi = $request->kondisi;
        $ben->jumlah = $request->jumlah;
        $ben->realisasi = $request-> realisasi;
        $ben->lebihkurang = $request-> lebihkurang;
        $ben->save();

        return redirect('/bencana');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ben = Bencana::find($id);
        $ben->delete();

        return redirect('/bencana');
    }
}
