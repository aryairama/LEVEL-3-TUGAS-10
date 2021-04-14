<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::paginate(5);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|min:5|max:255',
            'harga' => 'required|min:1',
            'jumlah' => 'required|digits_between:1,11|numeric',
            'keterangan' => 'required|min:5'
        ]);
        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->jumlah = $request->jumlah;
        $produk->keterangan = $request->keterangan;
        $produk->save();
        return response()->json([
            "status" => "success",
            "message" => "Insert Produk Success",
            "data" => null
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return response()->json([
            "status" => "success",
            "message" => "Get data Produk Success",
            "data" => $produk
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|min:5|max:255',
            'harga' => 'required|min:1',
            'jumlah' => 'required|digits_between:1,11|numeric',
            'keterangan' => 'required|min:5'
        ]);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->jumlah = $request->jumlah;
        $produk->keterangan = $request->keterangan;
        $produk->save();
        return response()->json([
            "status" => "updated",
            "message" => "Update Produk Success",
            "data" => null
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json([
            "status" => "success",
            "message" => "Delete Produk Success",
            "data" => null
        ], 200);
    }
}
