<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

const isSidebarOpen = ref(false);

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

const logout = () => {
    router.post('/logout');
};
</script>

<template>
    <div class="min-h-screen bg-slate-50 font-sans antialiased text-slate-800 flex relative">
        
        <!-- BACKDROP OVERLAY (Mobile) -->
        <div 
            v-if="isSidebarOpen" 
            @click="isSidebarOpen = false" 
            class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden transition-opacity duration-300"
        ></div>

        <!-- SIDEBAR (Maroon & Amber Accent) -->
        <aside 
            :class="[
                'bg-[#801416] text-red-100 transition-all duration-300 z-50 flex flex-col shrink-0 fixed lg:sticky top-0 bottom-0 left-0 min-h-screen shadow-xl w-64',
                isSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
            ]"
        >
            <!-- Brand Identity -->
            <div class="h-16 flex items-center px-5 border-b border-red-900/60 gap-3 bg-[#6b0f11] shrink-0">
                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#801416] font-black text-xs shadow-inner">
                    HMTP
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-bold text-white text-sm tracking-wide truncate">Workspace Divisi</span>
                    <span class="text-[10px] text-amber-400 font-semibold tracking-wider uppercase">Kewirausahaan</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
                <Link 
                    href="/divisi/dashboard" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium bg-red-900/50 text-amber-400 border border-amber-500/30 transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    Dashboard Divisi
                </Link>

                <button 
                    @click="logout" 
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-red-900/30 text-sm font-medium transition text-left text-red-300 hover:text-white"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar Sesi
                </button>
            </nav>
        </aside>

        <!-- CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col min-w-0 min-h-screen">
            <!-- TOPBAR -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-6 shrink-0 sticky top-0 z-30 shadow-sm">
                <button 
                    @click="toggleSidebar" 
                    class="p-2 text-slate-600 hover:text-slate-900 rounded-lg lg:hidden border border-slate-200 bg-slate-50"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>

                <div class="text-xs font-bold text-slate-500 hidden sm:block">
                    Himpunan Mahasiswa Teknologi Pertambangan PEPB
                </div>

                <!-- ✅ USER PANEL DI TOPBAR INI SUDAH DIAMANKAN DENGAN ?. -->
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-slate-700">
                        {{ $page.props.auth.user?.name || 'User Divisi' }}
                    </span>
                </div>
            </header>

            <!-- BODY PANEL -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ title || 'Workspace' }}</h1>
                </div>
                <slot />
            </main>
        </div>

    </div>
</template>