@extends('layout.app')

@section('content')
   
    <div class="flex items-center gap-3 mb-6">
        <h1 class="text-2xl font-bold text-secondary">Stok yang Kini Anda Miliki</h1>
        <a href="{{ route('item.riwayat_index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm text-sm font-medium">
            Riwayat Item
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
       
        @forelse($items as $item)
        <div class="bg-white rounded-3xl p-4 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg transition duration-300 relative group border border-transparent hover:border-primary">
           
                <div class="flex gap-2">
                                <a href="{{ route('item.edit', $item->id) }}" class="text-gray-300 hover:text-secondary transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('item.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-gray-300 hover:text-danger transition" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                </div>

            <div>
                <h3 class="font-bold text-darkGrey text-base truncate">{{ $item->nama_item }}</h3>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-secondary bg-gray-100 px-3 py-1 rounded-full">
                    {{ $item->satuan ?? 'Pcs' }}
                    </span>
                </div>
            </div>
        </div>
        @empty
            <div class="col-span-full text-center py-20">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                     <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-gray-800 font-bold">Belum ada barang</h3>
                <p class="text-gray-400 text-sm">Tekan tombol (+) untuk mulai mencatat.</p>
            </div>
        @endforelse
    </div>
@endsection
