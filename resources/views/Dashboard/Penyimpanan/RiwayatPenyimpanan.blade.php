@extends('layout.app')


@section('content')


<div class="max-w-3xl mx-auto py-6 px-4">
   
    {{-- Header Section --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('penyimpanan.index') }}"
           class="p-3 rounded-full bg-white text-theme-secondary shadow-sm hover:shadow-md transition border border-gray-100 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover:-translate-x-1 transition-transform">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-theme-secondary">Riwayat Stok</h2>
            <p class="text-sm text-gray-500">Daftar item yang telah dihapus atau dikeluarkan.</p>
        </div>
    </div>


    {{-- Content Section --}}
    <div class="space-y-4">
        @if($histories->isEmpty())
            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center py-16 bg-white rounded-3xl border border-dashed border-gray-300">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </div>
                <h3 class="text-gray-800 font-semibold text-lg">Riwayat Kosong</h3>
                <p class="text-gray-500 text-sm mt-1">Belum ada item yang dihapus.</p>
            </div>
        @else
            {{-- List Items --}}
            @foreach($histories as $data)
                <div class="group relative bg-white p-5 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg transition-all duration-300 overflow-hidden">
                   
                    {{-- Aksen Garis Kiri (Berubah warna saat hover) --}}
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gray-200 group-hover:bg-[#AFEE00] transition-colors duration-300"></div>


                    <div class="pl-4 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                       
                        {{-- Informasi Item --}}
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="text-theme-secondary font-bold text-lg {{ $data->status == 'Dihapus' ? 'line-through decoration-red-300 text-opacity-70' : '' }}">
                                    {{ $data->item->nama_item ?? 'Item tidak ditemukan' }}
                                </h3>
                                @if($data->status == 'Dihapus')
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-50 text-red-500 border border-red-100 uppercase tracking-wide">
                                        Deleted
                                    </span>
                                @endif
                            </div>
                           
                            <div class="flex items-center gap-3 text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span>{{ $data->lokasi->nama_lokasi ?? '-' }}</span>
                                </div>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <div class="flex items-center gap-1 font-medium text-theme-secondary">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    <span>{{ $data->kuantitas }} {{ $data->item->satuan ?? '' }}</span>
                                </div>
                            </div>
                        </div>


                        {{-- Timestamp --}}
                        <div class="flex flex-col items-start sm:items-end">
                            <span class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Dihapus Pada</span>
                            <div class="flex items-center gap-2 text-gray-600 font-medium bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ \Carbon\Carbon::parse($data->updated_at)->format('d M Y, H:i') }}
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>


@endsection
