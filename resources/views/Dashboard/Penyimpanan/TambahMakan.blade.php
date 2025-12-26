@extends('layout.app')


@section('content')


@php
    $isEdit = isset($dataEdit);
    $url = $isEdit ? route('penyimpanan.update', $dataEdit->id) : route('penyimpanan.store');
    $title = $isEdit ? 'Edit Penyimpanan' : 'Tambah Stok';
@endphp

<div class="max-w-3xl mx-auto">
   
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('penyimpanan.index') }}" class="p-2 rounded-xl bg-white border border-gray-200 text-gray-500 hover:text-secondary hover:border-secondary transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-secondary">{{ $title }}</h1>
            <p class="text-sm text-gray-500">Catat semua barang yang anda miliki .</p>
        </div>
    </div>


    <div class="bg-white rounded-3xl p-8 shadow-[0_2px_15px_rgba(0,0,0,0.03)] border border-gray-100">
       
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-600 border border-red-100 flex items-start gap-3">
                <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h4 class="font-bold text-sm">Terjadi Kesalahan</h4>
                    <ul class="list-disc list-inside text-sm mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif


        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($isEdit) @method('PUT') @endif


            <div class="space-y-6">
               
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                   
                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Item <span class="text-danger">*</span></label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                           
                            <select name="kategori_item_id" class="w-full pl-12 pr-10 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition appearance-none text-darkGrey font-medium cursor-pointer" required>
                                <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>-- Pilih Item --</option>
                                @foreach($item as $i)
                                    <option value="{{ $i->id }}" {{ (old('kategori_item_id', $dataEdit->item_id ?? '') == $i->id) ? 'selected' : '' }}>
                                        {{ $i->nama_item }} ({{ $i->satuan }})
                                    </option>
                                @endforeach
                            </select>
                           
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Item belum ada? <a href="{{ route('item.tambah') }}" class="text-secondary font-bold hover:underline">Tambah Baru</a></p>
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Lokasi Simpan <span class="text-danger">*</span></label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <select name="lokasi_id" class="w-full pl-12 pr-10 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition appearance-none text-darkGrey font-medium cursor-pointer" required>
                                <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>-- Pilih Lokasi --</option>
                                @foreach($lokasi as $loc)
                                    <option value="{{ $loc->id }}" {{ (old('lokasi_id', $dataEdit->lokasi_id ?? '') == $loc->id) ? 'selected' : '' }}>
                                        {{ $loc->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <label class="block text-sm font-semibold text-secondary mb-2">Kuantitas / Jumlah <span class="text-danger">*</span></label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                        </div>
                        <input type="number" name="kuantitas"
                            value="{{ old('kuantitas', $dataEdit->kuantitas ?? '') }}"
                            placeholder="Contoh: 12"
                            min="1"
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition text-darkGrey placeholder-gray-400 font-medium"
                            required>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Tanggal Masuk</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="date" name="tanggal_simpan"
                                value="{{ old('tanggal_simpan', $dataEdit->tanggal_simpan ?? date('Y-m-d')) }}"
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition text-darkGrey font-medium cursor-pointer"
                                required>
                        </div>
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Tanggal Kadaluarsa <span class="text-danger">*</span></label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-danger transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <input type="date" name="tanggal_kadaluarsa"
                                value="{{ old('tanggal_kadaluarsa', $dataEdit->tanggal_kadaluarsa ?? '') }}"
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-danger focus:ring-4 focus:ring-red-100 outline-none transition text-darkGrey font-medium cursor-pointer"
                                required>
                        </div>
                    </div>
                </div>


                <div>
                    <label class="block text-sm font-semibold text-secondary mb-2">Foto Barang <span class="text-gray-400 font-normal text-xs">(Opsional)</span></label>
                   
                    @if($isEdit && isset($dataEdit->foto))
                        <div class="mb-4 flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <img src="{{ asset('storage/' . $dataEdit->foto) }}" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                            <div>
                                <p class="text-xs text-gray-500">Foto saat ini</p>
                                <p class="text-sm font-medium text-darkGrey">Ganti foto dengan mengupload file baru di bawah.</p>
                            </div>
                        </div>
                    @endif


                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-200 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-white hover:border-primary transition group">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-gray-400 group-hover:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-sm text-gray-500 group-hover:text-darkGrey"><span class="font-semibold text-secondary">Klik upload</span> atau drag & drop</p>
                            <p class="text-xs text-gray-400">PNG, JPG (Maks. 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="foto" class="hidden" accept="image/*" />
                    </label>
                </div>


            </div>


            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="flex-1 py-3.5 px-6 rounded-xl bg-secondary text-primary font-bold text-base hover:bg-opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition transform shadow-md">
                    {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Data' }}
                </button>
                <a href="{{ route('penyimpanan.index') }}" class="flex-1 py-3.5 px-6 rounded-xl bg-gray-100 text-gray-500 font-bold text-center hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>


        </form>
    </div>
</div>


@endsection
