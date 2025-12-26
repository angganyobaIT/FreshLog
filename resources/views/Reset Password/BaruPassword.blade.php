<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Password Baru - FreshLog</title>
    
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
                Buat Password Baru
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Silakan atur ulang kata sandi Anda untuk mengamankan akun.
            </p>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-[450px]">
            <div class="bg-white px-6 py-10 shadow-xl shadow-secondary/5 rounded-2xl sm:px-10 border border-slate-100">

                @if(session('success'))
                    <div class="mb-6 rounded-lg bg-lime-50 p-4 border border-lime-200 flex items-start gap-3">
                        <span class="text-lg">✅</span>
                        <span class="text-sm font-medium text-lime-800 mt-0.5">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-secondary">
                            Password Baru
                        </label>
                        <div class="mt-2">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                placeholder="••••••••" 
                                required 
                                autofocus
                                class="block w-full rounded-xl border-0 py-3.5 text-secondary shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 transition-all"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium leading-6 text-secondary">
                            Konfirmasi Password
                        </label>
                        <div class="mt-2">
                            <input 
                                type="password" 
                                name="confirm_password" 
                                id="confirm_password"
                                placeholder="••••••••" 
                                required 
                                class="block w-full rounded-xl border-0 py-3.5 text-secondary shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 transition-all"
                            >
                        </div>
                    </div>

                    <div>
                        <button 
                            type="submit" 
                            class="flex w-full justify-center rounded-xl bg-secondary px-3 py-3.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-[#002528] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        >
                            Simpan Password
                        </button>
                    </div>
                </form>

            </div>

            <div class="mt-8 text-center border-t border-slate-200 pt-6">
                <a href="{{ route('login') }}" class="text-sm font-medium text-slate-500 hover:text-secondary transition-colors">
                    &larr; Batal & Kembali ke Login
                </a>
            </div>
        </div>
    </div>

</body>
</html>