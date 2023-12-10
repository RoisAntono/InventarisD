<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        
        User::create([
            'name' => 'Rois',
            'username' => 'rois123',
            'email' => 'rois@gmail.com',
            'password' => bcrypt('rois123'),
            'level_admin' => '1'
        ]);
        
        Produk::create([
            'NamaProduk' => 'Laptop',
            'Deskripsi' => 'Produk Lawas',
            'Harga' => '10000',
            'JumlahStock' => '6',
            'kategori_id' => '1',
        ]);

        Produk::create([
            'NamaProduk' => 'HP Grigi 5',
            'Deskripsi' => 'Hp Gaming Katanya sih',
            'Harga' => '7999999',
            'JumlahStock' => '8',
            'kategori_id' => '2',
        ]);
        
        Kategori::factory(20)->create();
        
    }
}
