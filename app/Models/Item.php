<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_item','satuan','kategori_item_id','is_delete','user_id'
    ];

    protected $table = 'items';

    public function kategori()
    {
        return $this->belongsTo(KategoriItem::class, 'kategori_item_id');
    }

    

    public function detailPenyimpanans()
    {
        return $this->hasMany(DetailPenyimpanan::class, 'item_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
