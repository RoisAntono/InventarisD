<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk.index', [
            'title' => 'Produk',
            'active' => 'produk',
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'title' => 'Tambah Produk',
            'active' => 'produk',
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NamaProduk' => 'required|max:255',
            'kategori_id' => 'required|max:255',
            'Deskripsi' => 'required|max:255',
            'Harga' => 'required|max:255',
            'JumlahStock' => 'required|max:255'
        ]);

        Produk::create($validatedData);

        return redirect('/produk')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produks = Produk::find($id);
        return response()->json([
            'status' => 200,
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produks = Produk::find($id);
        
        return view('produk.edit', [
            'title' => 'Edit Produk',
            'active' => 'produk',
            'produks' => $produks,
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produks = Produk::find($id);
        $rules = [
            'NamaProduk' => 'required|max:255',
            'kategori_id' => 'required|max:255',
            'Deskripsi' => 'required|max:255',
            'Harga' => 'required|max:255',
            'JumlahStock' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);
        
        Produk::where('id', $produks->id)
            ->update($validatedData);

        return redirect('/produk')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        // dd($id);
        
        return redirect('/produk')->with('status','Data berhasil dihapus');
        
    }
}
