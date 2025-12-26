<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandingPage FreshLog</title>
   
    {{-- 1. Tambahkan Link Google Fonts Poppins disini --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
       
        .bg-theme-dark { background-color: #003539; }
        .text-theme-dark { color: #003539; }
        .bg-theme-lime { background-color: #AFEE00; }
        .text-theme-lime { color: #AFEE00; }
        .border-theme-lime { border-color: #AFEE00; }


        .hero-pattern {
            background-image: radial-gradient(#AFEE00 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.05;
        }
    </style>
</head>


{{-- 2. Ubah class font-['Inter'] menjadi font-['Poppins'] --}}
<body class="font-['Poppins'] bg-gray-50 text-gray-800">


    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl bg-theme-dark flex items-center justify-center text-theme-lime">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-theme-dark tracking-tight">Fresh<span class="text-green-600">Log</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#fitur" class="text-gray-600 hover:text-theme-dark font-medium transition">Fitur</a>
                    <a href="#statistik" class="text-gray-600 hover:text-theme-dark font-medium transition">Statistik</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-6 py-2.5 rounded-full bg-theme-dark text-theme-lime font-bold hover:shadow-lg hover:-translate-y-0.5 transition transform">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 font-bold hover:text-theme-dark transition">Masuk</a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-theme-lime text-theme-dark font-bold border-2 border-transparent hover:bg-transparent hover:border-theme-dark hover:text-theme-dark transition">Daftar Sekarang</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 bg-theme-dark overflow-hidden">
        <div class="absolute inset-0 hero-pattern"></div>
       
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
           
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-theme-lime text-sm font-semibold mb-8 border border-white/10 backdrop-blur-sm animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-theme-lime animate-pulse"></span>
                Solusi Anti Makanan Mubazir
            </div>


            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Kelola Isi Kulkas <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#AFEE00] to-green-400">Tanpa Pusing.</span>
            </h1>
           
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300 mb-10 font-light">
                Website manajemen stok makanan pintar. Dapatkan notifikasi kedaluwarsa, pantau nutrisi, dan hemat pengeluaran belanja Anda.
            </p>


            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="px-8 py-4 rounded-full bg-theme-lime text-theme-dark font-bold text-lg hover:shadow-[0_0_20px_rgba(175,238,0,0.4)] hover:scale-105 transition transform duration-300">
                    Mulai Sekarang
                </a>
         
            </div>


        </div>
    </section>


    <section id="statistik" class="relative -mt-16 z-20 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white rounded-3xl p-8 shadow-[0_20px_50px_rgba(0,53,57,0.1)] border border-gray-100">
               
                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 rounded-2xl bg-theme-secondary/10 flex items-center justify-center text-theme-dark">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-theme-dark">{{ $stats['total_users']}}</div>
                        <div class="text-sm text-gray-500 font-medium">Pengguna Aktif</div>
                    </div>
                </div>


                <div class="flex items-center gap-4 p-4 rounded-2xl bg-theme-dark text-white shadow-lg transform md:-translate-y-2">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-theme-lime">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-theme-lime">{{ $stats['total_items']}}+</div>
                        <div class="text-sm text-gray-300 font-medium">Stok Terkelola</div>
                    </div>
                </div>


                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-theme-dark">Hemat</div>
                        <div class="text-sm text-gray-500 font-medium">Rp 100.000+</div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section id="fitur" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-theme-lime font-bold tracking-wide uppercase text-sm mb-2">Kenapa Memilih Kami?</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-theme-dark mb-4">Fitur Pintar untuk Dapur Modern</h3>
                <p class="text-gray-500">Kami menyederhanakan cara Anda mengelola bahan makanan, sehingga Anda bisa fokus memasak makanan lezat.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-[#003539] flex items-center justify-center mb-6 text-[#AFEE00]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Pengingat Kedaluwarsa</h4>
                    <p class="text-gray-500 leading-relaxed">Jangan biarkan makanan basi. Dapatkan notifikasi otomatis sebelum bahan makanan Anda mencapai masa kedaluwarsa.</p>
                </div>


                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-[#003539] flex items-center justify-center mb-6 text-[#AFEE00]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Pencatatan Mudah</h4>
                    <p class="text-gray-500 leading-relaxed">Catat barang masuk dan keluar hanya dengan beberapa klik. UI yang didesain intuitif untuk semua kalangan.</p>
                </div>


                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-[#003539] flex items-center justify-center mb-6 text-[#AFEE00]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Riwayat & Analisis</h4>
                    <p class="text-gray-500 leading-relaxed">Pantau kebiasaan konsumsi Anda melalui riwayat lengkap. Ketahui apa yang paling sering Anda buang atau beli.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-20 px-4">
        <div class="max-w-5xl mx-auto bg-theme-dark rounded-[3rem] p-10 md:p-16 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: radial-gradient(#AFEE00 2px, transparent 2px); background-size: 40px 40px;"></div>
           
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Siap Mengatur Dapur Anda?</h2>
                <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan pengguna lain yang telah berhasil mengurangi limbah makanan dan menghemat pengeluaran.</p>
               
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="px-10 py-4 rounded-full bg-theme-lime text-theme-dark font-bold text-lg hover:shadow-[0_0_20px_rgba(175,238,0,0.6)] hover:scale-105 transition transform duration-300">
                        Daftar Sekarang
                    </a>
                </div>
               
            </div>
        </div>
    </section>


    <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-theme-dark flex items-center justify-center text-theme-lime">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <span class="text-xl font-bold text-theme-dark">FreshLog</span>
                    </div>
                    <p class="text-gray-500 max-w-xs">Aplikasi manajemen stok terbaik untuk kebutuhan rumah tangga dan bisnis kecil.</p>
                </div>


                <div>
                    <h4 class="font-bold text-theme-dark mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-gray-500 text-sm">
                        <li><a href="https://wa.me/6285711328101" class="hover:text-theme-dark">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-100 pt-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} FreshLog. All rights reserved.
            </div>
        </div>
    </footer>


</body>
</html>