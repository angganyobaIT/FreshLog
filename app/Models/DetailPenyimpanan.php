<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenyimpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_simpan','tanggal_kadaluarsa','status','kuantitas','item_id','lokasi_id','user_id','foto',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

}
