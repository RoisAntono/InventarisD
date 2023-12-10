<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi.index', [
            'title' => 'Transaksi',
            'active' => 'transaksi',
            'transaksis' => Transaksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create', [
            'title' => 'Tambah Transaksi',
            'active' => 'transaksi',
            'produks' => Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Jumlah' => 'required|max:255',
            'NamaPelanggan' => 'required|max:255',
            'AlamatPelanggan' => 'required|max:255',
            'TeleponPelanggan' => 'required|max:255',
            'EmailPelanggan' => 'required|max:255',
            'produk_id' => 'required',
        ]);

        $stock = Produk::find($request->produk_id);

        if($stock->JumlahStock < $request->Jumlah)
        {
            return redirect('/transaksi/create')->with('status', 'Mohon maaf, Stock produk tidak mencukupi');
        }else
        {
            $stock->JumlahStock -= $request->Jumlah;
            $stock->save();
        }

        Transaksi::create($validatedData);

        return redirect('/transaksi')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.show', [
            'title' => 'Detail Transaksi',
            'active' => 'transaksi',
            'transaksi' => $transaksi
        ]);
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
