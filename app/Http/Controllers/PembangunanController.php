<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembangunan;

class PembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $pembangunan = Pembangunan::all();       
        return view('admin.belanja.pembangunan.pembangunan',compact('nomor','pembangunan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.belanja.pembangunan.tambahp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|max:2048|image',
        ]);

        $pembangunan = new Pembangunan;
        $pembangunan->rancangan = $request-> rancangan;
        $pembangunan->jasa = $request-> jasa;
        $pembangunan->penanggungjawab = $request-> penanggungjawab;
        $pembangunan->tanggal = $request-> tanggal;
        $pembangunan->estimasi = $request-> estimasi;
        $pembangunan->jumlah = $request-> jumlah;
        $pembangunan->realisasi = $request-> realisasi;
        $pembangunan->lebihkurang = $request-> lebihkurang;
        $pembangunan->foto = $request->foto->getClientOriginalName();
        $pembangunan->save();

        $request->foto->move('foto',$request->foto->getClientOriginalName());

        return redirect('/pembangunan');
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
        $pem = Jurusan::find($id);
        return view('pembangunan.edit',compact('pem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pem = Pembangunan::find($id);
        $pembangunan->rancangan = $request-> rancangan;
        $pembangunan->jasa = $request-> jasa;
        $pembangunan->penanggungjawab = $request-> penanggungjawab;
        $pembangunan->tanggal = $request-> tanggal;
        $pembangunan->estimasi = $request-> estimasi;
        $pembangunan->jumlah = $request-> jumlah;
        $pembangunan->realisasi = $request-> realisasi;
        $pembangunan->lebihkurang = $request-> lebihkurang;
        $pembangunan->foto = $request->foto->getClientOriginalName();
        $pem->save();

        return redirect('/pembangunan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
