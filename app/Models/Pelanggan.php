<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relasi tabel Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
