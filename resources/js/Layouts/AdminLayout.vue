<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

const isSidebarOpen = ref(true);

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

const logout = () => {
    router.post('/logout');
};
</script>

<template>
    <div class="min-h-screen bg-[#f4f6f9] font-sans antialiased text-slate-800 flex">
        
        <!-- SIDEBAR (AdminLTE Dark Style) -->
        <aside 
            :class="[
                'bg-[#343a40] text-[#c2c7d0] transition-all duration-300 z-50 flex flex-col shrink-0 min-h-screen shadow-xl',
                isSidebarOpen ? 'w-64' : 'w-0 -translate-x-full md:w-20 md:translate-x-0'
            ]"
        >
            <!-- Brand Logo -->
            <div class="h-14 flex items-center px-4 border-b border-[#4b545c] gap-3 bg-[#3f474e]/50 overflow-hidden">
                <div class="w-8 h-8 rounded-full bg-[#007bff] flex items-center justify-center text-white font-bold text-sm shadow-md shrink-0">
                    A
                </div>
                <span v-if="isSidebarOpen" class="font-light text-white text-lg tracking-wide whitespace-nowrap">
                    Admin<span class="font-semibold">LTE</span>
                </span>
            </div>

            <!-- User Panel (SUDAH AMAN) -->
            <div class="flex items-center p-4 border-b border-[#4b545c] gap-3 overflow-hidden">
                <div class="w-9 h-9 rounded-full bg-slate-600 border border-slate-500 flex items-center justify-center text-white font-semibold text-sm shrink-0">
                    {{ $page.props.auth.user?.name ? $page.props.auth.user.name.charAt(0) : 'A' }}
                </div>
                <div v-if="isSidebarOpen" class="flex flex-col min-w-0">
                    <span class="text-sm font-medium text-white truncate">
                        {{ $page.props.auth.user?.name || 'Admin' }}
                    </span>
                    <span class="text-xs text-emerald-400 flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 inline-block"></span> Online
                    </span>
                </div>
            </div>

            <!-- Sidebar Menu Navigation -->
            <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
                <Link 
                    href="/admin/dashboard" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded text-white bg-[#007bff] text-sm font-medium transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    <span v-if="isSidebarOpen" class="whitespace-nowrap">Dashboard</span>
                </Link>
            
                <button 
                    @click="logout" 
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded hover:bg-white/5 hover:text-white text-sm font-medium transition text-left text-red-400"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    <span v-if="isSidebarOpen" class="whitespace-nowrap">Keluar</span>
                </button>
            </nav>
        </aside>

        <!-- MAIN CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- TOP NAVBAR -->
            <header class="h-14 bg-white border-b border-slate-200 flex items-center justify-between px-4 shrink-0 shadow-sm">
                <div class="flex items-center gap-4">
                    <button @click="toggleSidebar" class="p-2 text-slate-600 hover:text-slate-900 rounded transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    </button>
                    <Link href="/" class="text-sm text-slate-500 hover:text-slate-900 hidden sm:inline-block">Home</Link>
                </div>

                <div class="text-xs font-semibold uppercase tracking-wider bg-slate-100 text-slate-600 px-3 py-1.5 rounded-lg border border-slate-200">
                    Role: Administrator
                </div>
            </header>

            <!-- CONTENT BODY CONTAINER -->
            <main class="flex-1 p-4 sm:p-6 overflow-y-auto">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6">
                    <h1 class="text-2xl font-normal text-slate-900">{{ title || 'Dashboard' }}</h1>
                </div>
                <slot />
            </main>
        </div>

    </div>
</template>