@extends('layout.app')


@section('content')


    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-secondary">Daftar Penyimpanan</h1>
            <p class="text-gray-500 text-sm">Kelola stok bahan makanan di berbagai lokasi.</p>
        </div>
       
        <div class="flex gap-3 w-full md:w-auto">
            <a href="{{ route('penyimpanan.history') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 bg-white text-darkGrey hover:bg-gray-50 transition font-medium shadow-sm">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Riwayat
            </a>


            <a href="{{ route('get.item') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-primary text-secondary font-bold hover:shadow-[0_0_15px_rgba(175,238,0,0.4)] transition transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Stok
            </a>
        </div>
    </div>


    <div class="flex gap-2 mb-6 overflow-x-auto hide-scrollbar pb-2">
        {{-- Tombol "Semua Lokasi" --}}
        <a href="{{ route('penyimpanan.index') }}" 
           class="px-4 py-2 rounded-full text-xs font-medium whitespace-nowrap border transition
           {{ request('lokasi') == null 
               ? 'bg-secondary text-primary font-semibold shadow-md border-transparent' 
               : 'bg-white text-gray-500 border-gray-100 hover:bg-gray-50' }}">
            Semua Lokasi
        </a>

        {{-- Looping Tombol Lokasi dari Database --}}
        @foreach($lokasis as $loc)
            <a href="{{ route('penyimpanan.index', ['lokasi' => $loc->nama_lokasi]) }}" 
               class="px-4 py-2 rounded-full text-xs font-medium whitespace-nowrap border transition
               {{ request('lokasi') == $loc->nama_lokasi 
                   ? 'bg-secondary text-primary font-semibold shadow-md border-transparent' 
                   : 'bg-white text-gray-500 border-gray-100 hover:bg-gray-50' }}">
                {{ $loc->nama_lokasi }}
            </a>
        @endforeach
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($penyimpanans as $data)
            <div class="group bg-white rounded-3xl p-4 shadow-[0_2px_10px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-transparent hover:border-primary/50 transition-all duration-300 relative">
               
                <div class="h-40 w-full bg-gray-50 rounded-2xl mb-4 overflow-hidden relative flex items-center justify-center">
                    @if($data->foto)
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->item->nama_item }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="text-gray-300">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif


                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded-lg text-[10px] font-bold text-secondary shadow-sm flex items-center gap-1">
                        <svg class="w-3 h-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $data->lokasi->nama_lokasi ?? 'Umum' }}
                    </div>
                </div>


                <div class="px-1">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-bold text-darkGrey text-lg leading-tight line-clamp-1">{{ $data->item->nama_item ?? 'Item tidak ditemukan' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">Exp: {{ \Carbon\Carbon::parse($data->tanggal_kadaluarsa)->format('d M Y') }}</p>
                        </div>
                       
                        <div class="flex gap-2">
                             <a href="{{ route('penyimpanan.edit', $data->id) }}" class="text-gray-300 hover:text-secondary transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                             </a>
                             <form action="{{ route('penyimpanan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-gray-300 hover:text-danger transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                             </form>
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="flex justify-between items-end mb-1">
                            <span class="text-2xl font-bold text-secondary">{{ $data->kuantitas }} <span class="text-xs font-normal text-gray-400">{{ $data->item->satuan ?? 'Unit' }}</span></span>
                           
                            @php
                                $sisa = $data->sisa_hari_angka;
                                $badgeColor = $sisa < 0 ? 'bg-red-100 text-red-600' : ($sisa < 7 ? 'bg-orange-100 text-orange-600' : 'bg-primary text-secondary');
                                $statusText = $sisa < 0 ? 'Kadaluarsa' : ($sisa == 0 ? 'Hari Ini' : $sisa . ' Hari Lagi');
                            @endphp
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold {{ $badgeColor }}">
                                {{ $statusText }}
                            </span>
                        </div>
                       
                        <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                            <div class="h-1.5 rounded-full {{ $sisa < 7 ? 'bg-danger' : 'bg-primary' }}" style="width: {{ max(5, min(100, $sisa * 10)) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                <div class="w-20 h-20 bg-green-50 rounded-full flex items-center justify-center mb-4 animate-pulse">
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-secondary">Penyimpanan Kosong</h3>
                <p class="text-gray-400 text-sm mt-1 max-w-xs text-center">Belum ada barang yang disimpan. Yuk, mulai isi stok dapurmu!</p>
                <a href="{{ route('get.item') }}" class="mt-6 px-6 py-2 bg-secondary text-primary font-bold rounded-full text-sm hover:bg-opacity-90 transition">
                    + Tambah Data
                </a>
            </div>
        @endforelse
    </div>

@endsection
