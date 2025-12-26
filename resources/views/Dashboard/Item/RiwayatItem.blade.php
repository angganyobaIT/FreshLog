@extends('layout.app')


@section('content')


    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('penyimpanan.index') }}" class="p-2 rounded-xl bg-white border border-gray-200 text-gray-500 hover:text-secondary hover:border-secondary transition shadow-sm group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-secondary">Riwayat Tambah Item</h1>
                <p class="text-sm text-gray-500">Log aktivitas item yang telah keluar dari penyimpanan.</p>
            </div>
        </div>


    </div>


    <div class="space-y-4">
       @forelse($items as $item)
    @php
        // Logika Visual (Kita set statis untuk tampilan 'Deleted Item')

    @endphp

    <div class="bg-white rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.02)] border border-gray-100 hover:border-gray-300 transition flex items-center justify-between group border-l-4 mb-4">
        
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 ">
                
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-base">
                    {{ $item->nama_item }}
                </h3>
                <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500 mt-1">
                    <span class="flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        {{ $item->kategori->nama_kategori ?? 'Kategori #' . $item->kategori_item_id }}
                    </span>
                    <span>&bull;</span>
                    <span class="flex items-center gap-1 text-gray-600 font-medium">
                        {{ $item->satuan }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">

            <form action="{{ route('item.restore', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin mengembalikan item ini?')">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-green-50 hover:bg-green-100 text-green-600 hover:text-green-700 font-bold py-2 px-4 rounded-xl transition duration-200 border border-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span>Restore</span>
                </button>
            </form>
        </div>

    </div>
</div>
@empty

@endforelse

@endsection
