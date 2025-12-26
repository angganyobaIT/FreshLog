<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\KategoriItem;
use Illuminate\Support\Facades\Auth; 

class ItemController extends Controller
{
    public function index()
    {
        // buat liat itemnya sendiri ini wok
        $items = Item::where('user_id', Auth::id())
                     ->where('is_delete', 0)
                     ->get();

        return view('Dashboard/Item/LihatSemuaItem', compact('items'));
    }

    public function riwayat_index()
    {

        $items = Item::where('user_id', Auth::id())
                     ->where('is_delete', 1)
                     ->get();

        return view('Dashboard/Item/RiwayatItem', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_item' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'kategori_item_id' => 'required|exists:kategori_items,id',
        ]);

        Item::create([
            'nama_item' => $request->nama_item,
            'satuan' => $request->satuan,
            'kategori_item_id' => $request->kategori_item_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('item.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $itemEdit = Item::find($id);

        $kategori = KategoriItem::all(); 

        return view('Dashboard/Item/TambahItem', compact('itemEdit', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_item' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'kategori_item_id' => 'required|exists:kategori_items,id',
        ]);

        $item = Item::where('user_id', Auth::id())->findOrFail($id);

        $item->update([
            'nama_item' => $request->nama_item,
            'satuan' => $request->satuan,
            'kategori_item_id' => $request->kategori_item_id,
        ]);

        return redirect()->route('item.index')->with('success', 'Item berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = Item::where('user_id', Auth::id())->findOrFail($id);

        $item->update([
            'is_delete' => 1
        ]);

        return redirect()->route('item.index')->with('success', 'Item berhasil dihapus.');
    }
    
    public function Restore($id)
    {
        $item = Item::where('user_id', Auth::id())->findOrFail($id);

        $item->update([
            'is_delete' => 0
        ]);

        return redirect()->route('item.riwayat_index')->with('success', 'Item berhasil di restore.');
    }
}