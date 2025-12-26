<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriItem extends Model
{
    use HasFactory;

    protected $table = 'kategori_items';

    protected $fillable = ['nama_kategori'];

    public function items()
    {
        return $this->hasMany(Item::class, 'kategori_item_id');
    }
}
