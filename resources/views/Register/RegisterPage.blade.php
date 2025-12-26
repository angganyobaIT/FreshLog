<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - FreshLog</title>
   
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


    <div class="min-h-screen flex flex-row-reverse">
       
        <div class="hidden lg:flex w-1/2 bg-secondary relative overflow-hidden items-center justify-center p-12">
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-primary rounded-full blur-[150px] opacity-10"></div>
            <div class="absolute top-10 right-10 w-32 h-32 bg-teal-600 rounded-full blur-[60px] opacity-40 animate-pulse"></div>
           
            <div class="relative z-10 text-center">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-14 h-14 bg-primary rounded-2xl flex items-center justify-center text-secondary font-bold text-3xl shadow-[0_0_20px_rgba(175,238,0,0.4)]">
                        F
                    </div>
                    <h1 class="text-4xl font-bold text-white tracking-tight">FreshLog.</h1>
                </div>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4 leading-tight">Mulai Gabung</h2>
                <p class="text-gray-300 text-lg max-w-md mx-auto">Pantau stok lebih mudah, kurangi limbah, dan hidup lebih hemat.</p>
            </div>
        </div>


        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-bgLight overflow-y-auto">
            <div class="w-full max-w-lg">
               
                <div class="lg:hidden text-center mb-8">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-10 h-10 bg-secondary rounded-xl flex items-center justify-center text-primary font-bold text-xl">F</div>
                        <h1 class="text-2xl font-bold text-secondary">FreshLog</h1>
                    </div>
                </div>


                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-secondary mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-500">Untuk memulai. Silakan lengkapi data berikut.</p>
                </div>


                <form action="{{ route('register.validate') }}" method="POST" class="space-y-5">
                    @csrf
                   
                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Nama Lengkap</label>
                        <input type="text" name="namereg" value="{{ old('namereg') }}" placeholder="Contoh: Dennise Surya Anggara" required
                            class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                        @error('namereg') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Username</label>
                        <input type="text" name="usernamereg" value="{{ old('usernamereg') }}" placeholder="Username harus unik (tanpa spasi)" autocomplete="off" required
                            class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                        @error('usernamereg') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-secondary mb-2">Email Address</label>
                        <input type="email" name="emailreg" value="{{ old('emailreg') }}" placeholder="Pastikan email benar dan aktif" required
                            class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                        @error('emailreg') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-secondary mb-2">Password</label>
                            <input type="password" name="passwordreg" placeholder="Min. 8 karakter" autocomplete="new-password" required
                                class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                            @error('passwordreg') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-semibold text-secondary mb-2">Ulangi Password</label>
                            <input type="password" name="conpasswordreg" placeholder="Ketik ulang password" required
                                class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all text-darkGrey font-medium placeholder-gray-400">
                            @error('conpasswordreg') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 px-6 rounded-xl bg-secondary text-primary font-bold text-lg hover:bg-opacity-95 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 transform shadow-md">
                        Daftar Sekarang
                    </button>


                    <p class="text-center text-gray-500 text-sm mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-secondary hover:text-primary transition no-underline hover:underline">
                            Login di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
       
    </div>


</body>
</html>
