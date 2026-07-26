<script setup>
import { ref, onMounted } from 'vue';
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    role: {
        type: String,
        default: 'anggota'
    }
});

const isMobileMenuOpen = ref(false);

// Object Mapping untuk warna tema (Clean Code - Pengganti Else/Switch)
const themeMap = {
    divisi: {
        bgAccent: 'bg-amber-500',
        textAccent: 'text-amber-600',
        sidebarActive: 'bg-amber-50 text-amber-700 font-semibold',
        borderAccent: 'border-amber-500',
        badge: 'bg-amber-100 text-amber-800 border-amber-200'
    },
    anggota: {
        bgAccent: 'bg-emerald-500',
        textAccent: 'text-emerald-600',
        sidebarActive: 'bg-emerald-50 text-emerald-700 font-semibold',
        borderAccent: 'border-emerald-500',
        badge: 'bg-emerald-100 text-emerald-800 border-emerald-200'
    }
};

// Ambil tema berdasarkan role prop (default ke anggota jika tidak ditemukan)
const theme = themeMap[props.role] || themeMap.anggota;

const logout = () => {
    router.post('/logout');
};
</script>

<template>
    <div class="min-h-screen bg-slate-50 font-sans antialiased text-slate-800 flex flex-col">
        
        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 sticky top-0 z-40 shadow-sm">
            <div class="flex items-center gap-4">
                <!-- Mobile Toggle Button -->
                <button 
                    @click="isMobileMenuOpen = !isMobileMenuOpen" 
                    class="p-2 text-slate-500 hover:text-slate-800 rounded-lg lg:hidden border border-slate-200 active:scale-95 transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>

                <!-- Brand HMTP Portal -->
                <div class="flex items-center gap-2.5">
                    <div :class="['w-8 h-8 rounded-lg flex items-center justify-center text-white font-black text-sm shadow-sm', theme.bgAccent]">
                        H
                    </div>
                    <span class="font-bold text-slate-900 tracking-tight text-base hidden sm:inline-block">
                        Portal<span :class="theme.textAccent">HMTP</span>
                    </span>
                </div>
            </div>

            <!-- User Status & Logout Quick Action -->
            <div class="flex items-center gap-3">
                <span :class="['text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full border', theme.badge]">
                    {{ role }}
                </span>
                <div class="w-px h-5 bg-slate-200 hidden sm:block"></div>
                <span class="text-sm font-medium text-slate-600 hidden sm:inline-block">{{ $page.props.auth.user.name }}</span>
            </div>
        </header>

        <!-- PORTAL INTERFACE BODY -->
        <div class="flex-1 flex max-w-7xl w-full mx-auto lg:px-8 relative">
            
            <!-- MOBILE SIDEBAR BACKDROP -->
            <div v-if="isMobileMenuOpen" @click="isMobileMenuOpen = false" class="fixed inset-0 bg-slate-900/40 z-40 lg:hidden"></div>

            <!-- RESPONSIVE SIDEBAR NAVIGATION -->
            <aside 
                :class="[
                    'w-64 bg-white border-r border-slate-200 p-4 flex flex-col gap-1 fixed lg:sticky top-16 bottom-0 left-0 h-[calc(100vh-4rem)] z-50 lg:z-10 transition-transform duration-300 lg:translate-x-0',
                    isMobileMenuOpen ? 'translate-x-0' : '-translate-x-full'
                ]"
            >
                <div class="text-[11px] font-bold uppercase tracking-widest text-slate-400 px-3 mb-2">Menu Navigasi</div>
                
                <Link 
                    href="/dashboard" 
                    :class="['flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition group hover:bg-slate-50', theme.sidebarActive]"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    Dashboard Utama
                </Link>

                <button 
                    @click="logout" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition text-red-500 hover:bg-red-50/50 mt-auto text-left w-full"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar Sesi
                </button>
            </aside>

            <!-- CORE SLICE DYNAMIC CONTENT -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 min-w-0">
                <slot />
            </main>
        </div>

    </div>
</template>