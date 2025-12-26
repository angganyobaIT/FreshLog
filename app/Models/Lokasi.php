<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lokasi'];

    public function detailPenyimpanans()
    {
        return $this->hasMany(DetailPenyimpanan::class, 'lokasi_id');
    }
}
