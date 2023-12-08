<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relasi tabel Pemasok
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    //Relasi tabel Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
