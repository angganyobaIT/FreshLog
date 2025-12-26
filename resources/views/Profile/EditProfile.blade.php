@extends('layout.app')

@section('content')

@php
    // 1. Style Input Form (Clean Code)
    $inputStyle = "w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl 
                   focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 
                   outline-none transition-all font-medium text-gray-700 placeholder-gray-400";
@endphp

<div class="min-h-screen flex items-center justify-center py-10 px-4">
    
    <div class="bg-white w-full max-w-lg rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden relative">
        
        {{-- Hiasan Header --}}
        <div class="h-24 bg-secondary relative">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#AFEE00 1px, transparent 1px); background-size: 20px 20px;"></div>
        </div>

        {{-- Form Content --}}
        <div class="px-8 pb-8 relative -mt-12">
            
            <form action="/dashboard/{{$usernow->username}}/edit" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Bagian Foto Profil --}}
                <div class="flex flex-col items-center mb-8">
                    {{-- Gunakan 'group' untuk trigger hover effect --}}
                    <div class="relative group cursor-pointer" onclick="document.getElementById('fileupload').click()">
                        
                        <div class="w-32 h-32 rounded-full border-4 border-white shadow-md overflow-hidden bg-gray-100 relative">
                            {{-- Image Preview --}}
                            <img id="previewImage" src="{{ asset('storage/store_photo/' . $usernow->image_profile) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Profile Photo">
                            
                            {{-- Overlay Icon Kamera (Refactored to Tailwind) --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-secondary/70">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                        </div>

                        {{-- Input File Hidden --}}
                        <input type="file" name="foto" id="fileupload" class="hidden" accept=".png, .jpg, .jpeg">
                        
                        {{-- Tombol Kecil Edit (Pencil) --}}
                        <div class="absolute bottom-0 right-0 bg-secondary text-primary p-2 rounded-full border-2 border-white shadow-sm hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-3 group-hover:text-secondary transition-colors">Klik foto untuk mengganti</p>
                </div>

                {{-- Input Fields --}}
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-2">Nama Anda</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            
                            <input type="text" name="field_nama" value="{{ $usernow->name }}" 
                                   class="{{ $inputStyle }}" 
                                   placeholder="Nama Lengkap">
                        </div>
                    </div>
                </div>
                
                <div class="mt-10 flex gap-4">
                    <a href="/ShowProfile" class="flex-1 py-3.5 rounded-xl border border-gray-200 text-gray-500 font-bold text-center hover:bg-gray-50 transition no-underline">
                        Kembali
                    </a>

                    <button type="submit" class="flex-1 py-3.5 rounded-xl bg-secondary text-primary font-bold shadow-lg shadow-teal-900/10 hover:shadow-teal-900/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Script Sederhana untuk Preview Image --}}
<script>
    document.getElementById('fileupload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => document.getElementById('previewImage').src = e.target.result;
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection