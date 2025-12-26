<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_lokasi' => 'Kulkas'],
            ['nama_lokasi' => 'Rak Bumbu'],
            ['nama_lokasi' => 'Lemari'],
        ];

        Lokasi::insert($data);
    }
}
