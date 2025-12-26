@extends('layout.app')


@section('content')


    <div class="mb-8">
        <h1 class="text-2xl font-bold text-secondary">Profil Saya</h1>
        <p class="text-gray-500 text-sm">Kelola informasi akun dan keamanan akun.</p>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
       
        <div class="md:col-span-1">
            <div class="bg-white rounded-3xl p-8 shadow-[0_2px_15px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col items-center text-center relative overflow-hidden">
               
                <div class="absolute top-0 left-0 w-full h-24 bg-secondary"></div>
                <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-24 h-24 bg-primary rounded-full blur-2xl opacity-50"></div>


                <div class="relative mt-8 mb-4">
                    <div class="w-28 h-28 rounded-full p-1 bg-white shadow-lg">
                        <img src="{{ Auth::user()->image_profile ? asset('storage/store_photo/' . Auth::user()->image_profile) : 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=AFEE00&color=003539' }}"
                             alt="Profile"
                             class="w-full h-full rounded-full object-cover border-2 border-gray-100">
                    </div>
                    <div class="absolute bottom-1 right-2 w-5 h-5 bg-green-500 border-4 border-white rounded-full"></div>
                </div>


                <h2 class="text-xl font-bold text-darkGrey">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500 mb-1">{{ '@' . Auth::user()->username }}</p>


                <div class="grid grid-cols-2 w-full mt-6 pt-6 border-t border-gray-100">
                    <div>
                        <span class="block font-bold text-lg text-secondary">12</span>
                        <span class="text-xs text-gray-400">Barang</span>
                    </div>
                    <div>
                        <span class="block font-bold text-lg text-secondary">Active</span>
                        <span class="text-xs text-gray-400">Status</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="md:col-span-2 space-y-6">
           
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Informasi Akun
                </h3>
               
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Nama Lengkap</label>
                        <div class="text-darkGrey font-medium border-b border-gray-100 pb-2">{{ Auth::user()->name }}</div>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Email Address</label>
                        <div class="text-darkGrey font-medium border-b border-gray-100 pb-2">{{ Auth::user()->email }}</div>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Username</label>
                        <div class="text-darkGrey font-medium border-b border-gray-100 pb-2">{{ Auth::user()->username }}</div>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Bergabung Sejak</label>
                        <div class="text-darkGrey font-medium border-b border-gray-100 pb-2">{{ \Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </h3>


                <div class="space-y-3">
                    <button onclick="window.location.href='{{ url('Edit-Profile') }}'"
                            class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-50 hover:bg-blue-50 transition group cursor-pointer border border-transparent hover:border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-blue-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                            <div class="text-left">
                                <h4 class="font-semibold text-darkGrey group-hover:text-blue-700">Edit Profil</h4>
                                <p class="text-xs text-gray-400">Ubah nama dan foto</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-blue-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>


                    <button onclick="window.location.href='{{ url('/secure') }}'"
                            class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-50 hover:bg-orange-50 transition group cursor-pointer border border-transparent hover:border-orange-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-orange-500 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <div class="text-left">
                                <h4 class="font-semibold text-darkGrey group-hover:text-orange-700">Keamanan Akun</h4>
                                <p class="text-xs text-gray-400">Ganti password</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-orange-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                </div>
            </div>


        </div>
    </div>
@endsection



