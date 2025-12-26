<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriItem;

class KategoriController extends Controller
{
    public function create()
{
    $kategori = KategoriItem::all();

    return view('Dashboard/Item/TambahItem', compact('kategori'));
}
}
