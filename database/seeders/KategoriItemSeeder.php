<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoriitem;


class KategoriItemSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Daging'],
            ['nama_kategori' => 'Bumbu'],
            ['nama_kategori' => 'Makanan Kering'],
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Makanan Basah'],
            ['nama_kategori' => 'Sayuran'],
        ];

        KategoriItem::insert($data);
    }
}
