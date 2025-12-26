<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - FreshLog</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#AFEE00',   /* Lime Fresh */
                        secondary: '#003539', /* Deep Teal */
                        danger: '#F87171',    /* Soft Red */
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full font-sans antialiased text-slate-800">

    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
            <h1 class="text-3xl font-bold text-secondary">
                FreshLog 
            </h1>
            <h2 class="mt-4 text-2xl font-bold leading-9 tracking-tight text-secondary">
                Lupa Password?
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Jangan khawatir, kami akan mengirimkan petunjuk reset ke email Anda.
            </p>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-10 shadow-xl shadow-secondary/5 rounded-2xl sm:px-10 border border-slate-100">
                
                {{-- 🔴 Alert Error --}}
                @if(session('error'))
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-200 flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium text-red-800">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- 🟢 Alert Success --}}
                @if(session('status'))
                    <div class="mb-6 rounded-lg bg-lime-50 p-4 border border-lime-200 flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium text-lime-800">{{ session('status') }}</span>
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-secondary">
                            Email Address
                        </label>
                        <div class="mt-2 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                name="email" 
                                id="email"
                                placeholder="nama@email.com" 
                                required 
                                autocomplete="email"
                                autofocus
                                value="{{ old('email') }}"
                                class="block w-full rounded-xl border-0 py-3.5 pl-10 text-secondary shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 transition-all"
                            >
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Tombol Utama --}}
                    <div>
                        <button 
                            type="submit" 
                            class="flex w-full justify-center rounded-xl bg-secondary px-3 py-3.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-[#002528] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        >
                            Kirim Kode Reset
                        </button>
                    </div>
                </form>

                {{-- Tombol Kembali --}}
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="flex w-full justify-center items-center gap-2 rounded-xl bg-slate-100 px-3 py-3.5 text-sm font-semibold leading-6 text-slate-600 hover:bg-slate-200 hover:text-secondary transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali ke Login
                    </a>
                </div>

                {{-- Footer Text --}}
                <p class="mt-8 text-xs text-center text-slate-400">
                    Pastikan email yang Anda masukkan sudah benar dan aktif.
                </p>

            </div>
        </div>
    </div>

</body>
</html>