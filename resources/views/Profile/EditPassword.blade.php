@extends('layout.app')

@section('content')

<div class="flex items-center justify-center py-10">

    <div class="bg-white w-full max-w-lg rounded-3xl shadow-[0_20px_50px_rgba(0,53,57,0.08)] border border-slate-100 overflow-hidden relative">

        <div class="h-32 bg-secondary relative overflow-hidden">
            <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#AFEE00 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
        </div>

        <div class="px-8 pb-10 relative -mt-16">

            <div class="flex justify-center mb-6">
                <div class="w-28 h-28 rounded-full bg-white flex items-center justify-center shadow-xl shadow-gray-200/50 border-[6px] border-white text-secondary relative z-10">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
            </div>

            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-secondary">Ubah Password</h1>
                <p class="text-sm text-slate-400 mt-2 leading-relaxed">
                    Pastikan akun Anda tetap aman dengan memperbarui<br>
                    kata sandi secara berkala.
                </p>
            </div>

            @if ($errors->any())
                <div class="p-4 mb-6 rounded-xl bg-red-50 text-red-700 border border-red-100 text-sm flex items-start gap-3 animate-pulse">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="p-4 mb-6 rounded-xl bg-lime-50 text-lime-800 border border-lime-200 text-sm flex items-center gap-3">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <form action="/change-password" method="POST">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2 ml-1">Password Baru</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            
                            <input type="password" name="new_password" placeholder="Min. 8 karakter" required class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl transition-all duration-300 text-slate-700 font-medium placeholder-slate-400  focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2 ml-1">Konfirmasi Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <input type="password" name="confirm_password" placeholder="Ketik ulang password baru" required class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl transition-all duration-300 text-slate-700 font-medium placeholder-slate-400  focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex flex-col-reverse sm:flex-row gap-4">
                    <a href="/ShowProfile" class="flex-1 py-3.5 rounded-xl border border-slate-200 text-slate-500 font-bold text-center hover:bg-slate-50 hover:text-secondary transition-colors duration-200 no-underline">
                        Kembali
                    </a>

                    <button type="submit" class="flex-1 py-3.5 rounded-xl bg-secondary text-primary font-bold shadow-lg shadow-teal-900/10 hover:shadow-teal-900/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    Simpan Password
                    </button>
                </div>

            </form>

            <div class="mt-8 pt-6 border-t border-slate-100">
                <p class="text-xs text-center text-slate-400">
                    <span class="font-semibold text-secondary">Tips Keamanan:</span> Gunakan kombinasi huruf besar, angka, dan simbol.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection