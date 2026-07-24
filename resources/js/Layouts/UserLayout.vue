<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

const isMobileMenuOpen = ref(false);

const logout = () => {
    router.post('/logout');
};
</script>

<template>
    <div class="min-h-screen bg-[#fcfcfc] font-sans antialiased text-slate-800 flex flex-col">
        
        <!-- PORTAL BRAND HEADER -->
        <header class="bg-white border-b border-slate-100 px-4 py-3 sm:px-8 flex items-center justify-between shadow-sm z-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#801416] flex items-center justify-center text-white font-black text-xs shadow-md">
                    HMTP
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-slate-900 leading-tight text-sm sm:text-base">Himpunan Mahasiswa</span>
                    <span class="text-xs text-red-700 font-medium">Teknologi Pertambangan PEPB</span>
                </div>
            </div>

            <!-- Desktop Nav Items -->
            <div class="hidden md:flex items-center gap-6">
                <Link href="/dashboard" class="text-sm font-semibold text-red-800 border-b-2 border-red-700 pb-1">
                    Dashboard Anggota
                </Link>
                <button @click="logout" class="text-sm font-medium text-slate-500 hover:text-red-700 transition">
                    Keluar
                </button>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button 
                @click="isMobileMenuOpen = !isMobileMenuOpen" 
                class="p-2 border border-slate-200 rounded-lg md:hidden text-slate-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
        </header>

        <!-- MOBILE NAV DROPDOWN PANEL -->
        <div v-if="isMobileMenuOpen" class="bg-white border-b border-slate-200 p-4 flex flex-col gap-3 md:hidden shadow-md animate-in fade-in slide-in-from-top-2">
            <Link href="/dashboard" class="text-sm font-semibold text-red-800 px-2 py-1.5 bg-red-50 rounded-lg">
                Dashboard Anggota
            </Link>
            <button @click="logout" class="text-sm font-medium text-left text-slate-600 px-2 py-1.5 hover:bg-slate-50 rounded-lg">
                Keluar Sesi
            </button>
        </div>

        <div class="bg-gradient-to-r from-[#9b1c1c] via-[#801416] to-[#d97706] text-white px-4 py-8 sm:px-8 sm:py-12 shadow-inner">
            <div class="max-w-7xl mx-auto">
                <span class="text-[10px] font-bold tracking-widest uppercase bg-black/20 text-amber-300 px-2.5 py-1 rounded-md border border-amber-500/20">
                    Portal Keanggotaan Resmi
                </span>
                <h2 class="text-xl sm:text-3xl font-bold tracking-tight mt-3">
                    {{ title || 'Selamat Datang di Portal Anggota' }}
                </h2>
                <p class="text-xs sm:text-sm text-red-100/90 mt-1 max-w-2xl font-light">
                    Politeknik Energi & Pertambangan Bandung.
                </p>
            </div>
        </div>

        <main class="flex-1 max-w-7xl w-full mx-auto p-4 sm:p-6 lg:p-8 -mt-6 sm:-mt-8 z-10">
            <!-- Isi Konten Utama Ter-slicing di Sini -->
            <slot />
        </main>

    </div>
</template>