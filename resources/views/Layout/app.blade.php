<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'FreshLog') }} - Stay Fresh, Stay Safe</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#AFEE00',   /* Lime Green */
                        secondary: '#003539', /* Deep Teal */
                        bgLight: '#F8FAFC',   /* Off-White */
                        danger: '#F87171',    /* Soft Red */
                        darkGrey: '#1E293B',  /* Text Color */
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; color: #1E293B; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-bgLight text-darkGrey antialiased">


    <div class="flex min-h-screen relative">
        <aside class="w-64 bg-secondary text-white hidden md:flex flex-col fixed h-full z-20">
            @include('components.sidebar')
        </aside>


        <main class="flex-1 md:ml-64 p-4 md:p-8 w-full pb-24"> <div class="md:hidden flex justify-between items-center mb-6">
                <span class="font-bold text-xl text-secondary">FreshLog</span>
                <button class="text-secondary">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>


            @yield('content')
        </main>


        @auth
        <a href="{{ route('item.tambah') }}"
           class="fixed bottom-6 right-6 bg-primary text-secondary p-4 rounded-full shadow-lg hover:scale-110 transition transform border-4 border-white z-50 flex items-center justify-center group">
            <svg class="w-8 h-8 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
        </a>
        @endauth
    </div>


</body>
</html>
