<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - FreshLog</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#AFEE00',   /* Lime Green */
                        secondary: '#003539', /* Deep Teal */
                        bgLight: '#F8FAFC',   /* Off-White */
                        darkGrey: '#1E293B',  /* Text Color */
                        danger: '#F87171',    /* Soft Red */
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-bgLight text-darkGrey antialiased">

    <div class="min-h-screen flex">
        
        <div class="hidden lg:flex w-1/2 bg-secondary relative overflow-hidden items-center justify-center p-12">
            
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-primary rounded-full blur-[150px] opacity-10"></div>
            <div class="absolute top-10 right-10 w-32 h-32 bg-teal-600 rounded-full blur-[60px] opacity-40 animate-pulse"></div>

            <div class="relative z-10 text-center">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-14 h-14 bg-primary rounded-2xl flex items-center justify-center text-secondary font-bold text-3xl shadow-[0_0_20px_rgba(175,238,0,0.4)]">
                        F
                    </div>
                    <h1 class="text-4xl font-bold text-white tracking-tight">FreshLog.</h1>
                </div>
                <h2 class="text-3xl font-bold text-white mb-4 leading-tight">Selamat Datang Kembali!</h2>
                <p class="text-gray-300 text-lg max-w-md mx-auto">Jaga makananmu agar tetap segar dan aman. Masuk untuk melanjutkan pengelolaan stok Anda.</p>
            </div>

            <div class="absolute bottom-6 text-gray-400 text-xs z-10">
                © 2025 FreshLog. All rights reserved.
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-bgLight overflow-y-auto">
            <div class="w-full max-w-md">
                
                <div class="hidden lg:block mb-10">
                    <h2 class="text-3xl font-bold text-secondary mb-2">Login Akun</h2>
                    <p class="text-gray-500">Masukkan detail akun Anda untuk mengakses dashboard.</p>
                </div>

                @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-600 border border-red-100 flex items-center gap-3 text-sm font-medium animate-pulse">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('login.validate') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-semibold text-secondary mb-2">Username</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>

                            <input type="text" name="usernamelgn" id="username" required autofocus  placeholder="Masukkan Username"
                                class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-sm font-semibold text-secondary">Password</label>
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-secondary hover:text-primary transition">Lupa Password?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            
                            <input type="password" name="passwordlgn" id="password" required placeholder="••••••••"
                            class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 px-6 rounded-xl bg-primary text-secondary font-bold text-lg hover:bg-opacity-90 hover:shadow-[0_4px_20px_rgba(175,238,0,0.3)] hover:-translate-y-0.5 transition-all duration-300 transform shadow-md">
                        Masuk Sekarang
                    </button>

                    <p class="text-center text-gray-500 text-sm mt-8">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold text-secondary hover:text-primary transition no-underline hover:underline">
                            Daftar di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>