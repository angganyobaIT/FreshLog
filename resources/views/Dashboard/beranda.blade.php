@extends('Layout.app')


@section('content')


    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-secondary">Halo, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-gray-500 text-sm">Ayo cek isi dapurmu agar tetap segar.</p>
        </div>
       
        <form action="{{ route('item.index') }}" method="GET" class="relative w-full md:w-80">
            <input type="text" name="search" placeholder="Cari bahan makanan..."
                class="w-full pl-12 pr-4 py-3 rounded-2xl border-none bg-white shadow-sm focus:ring-2 focus:ring-primary focus:outline-none text-sm text-darkGrey placeholder-gray-400">
            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </form>
    </div>


    <div class="mb-10">
        <div class="flex justify-between items-end mb-4 px-1">
            <h2 class="text-lg font-bold text-secondary">Lokasi Penyimpanan</h2>
            <a href="{{ route('penyimpanan.index') }}" class="text-xs font-semibold text-primary bg-secondary px-3 py-1 rounded-full hover:bg-opacity-90 transition">Lihat Semua</a>
        </div>


        <div class="flex overflow-x-auto space-x-4 pb-4 hide-scrollbar snap-x">
           
            <a href="{{ route('penyimpanan.index', ['lokasi' => 'kulkas']) }}" class="snap-start min-w-[140px] bg-white p-4 rounded-3xl shadow-sm border border-transparent hover:border-primary transition group cursor-pointer flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-primary group-hover:text-secondary transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="font-semibold text-darkGrey text-sm">Kulkas</h3>
            </a>


            <a href="{{ route('penyimpanan.index', ['lokasi' => 'lemari']) }}" class="snap-start min-w-[140px] bg-white p-4 rounded-3xl shadow-sm border border-transparent hover:border-primary transition group cursor-pointer flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-cyan-50 text-cyan-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-primary group-hover:text-secondary transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="font-semibold text-darkGrey text-sm">Lemari</h3>
            </a>


            <a href="{{ route('penyimpanan.index', ['lokasi' => 'Rak Bumbu']) }}" class="snap-start min-w-[140px] bg-white p-4 rounded-3xl shadow-sm border border-transparent hover:border-primary transition group cursor-pointer flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-primary group-hover:text-secondary transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="font-semibold text-darkGrey text-sm">Rak Bumbu</h3>
            </a>


            <a href="#" class="snap-start min-w-[140px] bg-white p-4 rounded-3xl shadow-sm border border-transparent hover:border-primary transition group cursor-pointer flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-primary group-hover:text-secondary transition">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <h3 class="font-semibold text-darkGrey text-sm">Keranjang</h3>
            </a>
        </div>
    </div>


    <div>
        <h2 class="text-lg font-bold text-secondary mb-4 px-1 flex items-center gap-2">
            Produk Hampir Kadaluarsa 
            <span class="bg-danger text-white text-[10px] px-2 py-0.5 rounded-full">Peringatan</span>
        </h2>


        <div class="space-y-3">
    @forelse($urgentItems as $data)
        <div class="flex items-center justify-between bg-white border-l-4 border-danger p-4 rounded-xl shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-4">
                {{-- Logika Gambar: Jika ada foto pakai foto, jika tidak pakai Icon Default --}}
                @if($data->foto)
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Makanan" class="w-12 h-12 rounded-lg object-cover bg-red-50">
                @else
                    <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center text-danger">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                @endif

                <div>
                    {{-- Menampilkan Nama Item dari relasi --}}
                    <h4 class="font-semibold text-darkGrey">{{ $data->item->nama_item ?? 'Item Tidak Diketahui' }}</h4>
                    
                    {{-- Logika Teks Peringatan --}}
                    <p class="text-xs text-danger font-medium">
                        @if($data->sisa_hari < 0)
                            Telah Kadaluarsa {{ abs($data->sisa_hari) }} hari lalu
                        @elseif($data->sisa_hari == 0)
                            Kadaluarsa HARI INI!
                        @elseif($data->sisa_hari == 1)
                            Kadaluarsa BESOK!
                        @else
                            Kadaluarsa dalam {{ $data->sisa_hari }} hari
                        @endif
                    </p>
                </div>
            </div>
        </div>
    @empty
        {{-- Tampilan jika TIDAK ada item yang darurat --}}
        <div class="p-4 text-center bg-white rounded-xl shadow-sm">
            <p class="text-gray-500 text-sm">Aman! Tidak ada bahan makanan yang akan kadaluarsa dalam waktu dekat.</p>
        </div>
    @endforelse
</div>



        </div>
    </div>


@endsection

