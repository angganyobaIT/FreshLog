<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Reset Password - FreshLog</title>
    
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

        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h1 class="text-3xl font-bold text-secondary">
                FreshLog 
            </h1>
            <h2 class="mt-4 text-2xl font-bold leading-9 tracking-tight text-secondary">
                Verifikasi Keamanan
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Masukkan kode 6 digit yang telah kami kirim ke:
            </p>

            <div class="mt-3 inline-flex items-center px-3 py-1 rounded-full bg-teal-50 border border-teal-100 text-teal-800 text-sm font-medium">
                📧 {{ session('reset_email') ?? 'email@anda.com' }}
            </div>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-[450px]">
            <div class="bg-white px-6 py-10 shadow-xl shadow-secondary/5 rounded-2xl sm:px-10 border border-slate-100">
                
                {{-- 🟢 Alert Success --}}
                @if(session('success'))
                    <div class="mb-6 rounded-lg bg-lime-50 p-4 border border-lime-200 text-center">
                        <p class="text-sm font-medium text-lime-800">✅ {{ session('success') }}</p>
                    </div>
                @endif

                {{-- 🔴 Alert Error --}}
                @if(session('error'))
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-200 text-center">
                        <p class="text-sm font-medium text-red-800">⚠ {{ session('error') }}</p>
                    </div>
                @endif

                <form action="{{ route('password.verify') }}" method="POST" class="space-y-6" autocomplete="off">
                    @csrf
                    
                    <div>
                        <label for="otp" class="block text-sm font-medium leading-6 text-secondary text-center mb-3">
                            Ketik Kode OTP
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="otp" 
                                id="otp"
                                placeholder="000000" 
                                required 
                                maxlength="6"
                                autofocus
                                class="block w-full rounded-xl border-0 py-4 text-secondary text-center text-3xl tracking-[0.5em] font-bold shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-200 focus:ring-2 focus:ring-inset focus:ring-primary transition-all duration-200"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                            >
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="flex w-full justify-center rounded-xl bg-secondary px-3 py-3.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-[#002528] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                    >
                        Verifikasi Kode
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs text-slate-400">
                        Kode berlaku selama 5 menit.
                    </p>
                </div>

            </div>


            <div class="mt-6 text-center">
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-slate-500 hover:text-danger transition-colors flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                    </svg>
                    Salah email? Kembali
                </a>
            </div>
        </div>
    </div>

</body>
</html>