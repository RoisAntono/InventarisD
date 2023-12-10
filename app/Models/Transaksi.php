<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Carbon
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    //Relasi tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
