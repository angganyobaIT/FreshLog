<div class="h-full flex flex-col justify-between py-6 px-4 bg-secondary text-white">
    <div>
        <div class="flex items-center gap-3 mb-10 px-2">
            <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-secondary font-bold text-xl shadow-[0_0_15px_rgba(175,238,0,0.3)]">
                F
            </div>
            <div>
                <h1 class="font-bold text-xl tracking-tight text-white">FreshLog</h1>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest">Stay Fresh, Stay Safe</p>
            </div>
        </div>

        <nav class="space-y-2">
            
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
               {{ request()->routeIs('dashboard') ? 'bg-white/10 text-primary font-semibold border-l-4 border-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span>Beranda</span>
            </a>

            <a href="{{ route('item.index') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
               {{ request()->routeIs('item.*') ? 'bg-white/10 text-primary font-semibold border-l-4 border-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span>Item Saya</span>
            </a>

            <a href="{{ route('penyimpanan.index') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
               {{ request()->routeIs('penyimpanan.*') ? 'bg-white/10 text-primary font-semibold border-l-4 border-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span>Penyimpanan</span>
            </a>

            <a href="{{ route('Show.Profile') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
               {{ request()->routeIs('Show.Profile') ? 'bg-white/10 text-primary font-semibold border-l-4 border-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>Profil</span>
            </a>

        </nav>
    </div>

    <div class="border-t border-white/10 pt-4">
        <div class="flex items-center gap-3 mb-4 px-2">
            <img src="{{ Auth::user()->image_profile ? asset('storage/store_photo/' . Auth::user()->image_profile) : 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=AFEE00&color=003539' }}" 
                 class="w-10 h-10 rounded-full object-cover border-2 border-primary">
            <div class="overflow-hidden">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?? 'User' }}</p>
                <p class="text-[10px] text-primary truncate">Online</p>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-200 font-medium text-sm group">
                <svg class="w-4 h-4 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>
</div>