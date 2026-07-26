<script setup>
import { ref, computed } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        default: 'Dashboard',
    },
});

const page = usePage();

const sidebarOpen = ref(false);
const sidebarCollapsed = ref(false);

const openMenus = ref({
    master: false,
    transaksi: false,
    laporan: false,
});

const user = computed(() => page.props.auth?.user);

const toggleMenu = (menu) => {
    openMenus.value[menu] = !openMenus.value[menu];
};

const logout = () => {
    router.post('/logout');
};

const isActive = (url) => {
    return window.location.pathname === url;
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 text-slate-800">

        <!-- MOBILE OVERLAY -->
        <Transition name="fade">
            <div
                v-if="sidebarOpen"
                class="fixed inset-0 bg-black/50 z-40 lg:hidden"
                @click="sidebarOpen = false"
            ></div>
        </Transition>


        <!-- SIDEBAR -->
        <aside
            :class="[
                'fixed top-0 left-0 z-50 h-screen bg-[#343a40] text-slate-300 flex flex-col transition-all duration-300',
                'lg:translate-x-0',
                sidebarOpen ? 'translate-x-0' : '-translate-x-full',
                sidebarCollapsed ? 'lg:w-20' : 'lg:w-64',
                'w-72'
            ]"
        >

            <!-- BRAND -->
            <div class="h-16 flex items-center border-b border-white/10 px-4 shrink-0">

                <div
                    class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold shrink-0"
                >
                    A
                </div>

                <div
                    v-if="!sidebarCollapsed"
                    class="ml-3 overflow-hidden"
                >
                    <h1 class="text-white font-semibold whitespace-nowrap">
                        Admin Panel
                    </h1>

                    <p class="text-xs text-slate-400 whitespace-nowrap">
                        Sistem Administrasi
                    </p>
                </div>

                <!-- MOBILE CLOSE -->
                <button
                    @click="sidebarOpen = false"
                    class="ml-auto lg:hidden text-slate-400 hover:text-white"
                >
                    ✕
                </button>

            </div>


            <!-- USER -->
            <div
                v-if="!sidebarCollapsed"
                class="px-4 py-4 border-b border-white/10"
            >
                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-slate-600 flex items-center justify-center text-white font-semibold shrink-0"
                    >
                        {{ user?.name?.charAt(0)?.toUpperCase() || 'A' }}
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm text-white font-medium truncate">
                            {{ user?.name || 'Administrator' }}
                        </p>

                        <div class="flex items-center gap-1 mt-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>

                            <span class="text-xs text-slate-400">
                                Online
                            </span>
                        </div>
                    </div>

                </div>
            </div>


            <!-- MENU -->
            <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">

                <!-- MENU LABEL -->
                <div
                    v-if="!sidebarCollapsed"
                    class="px-3 mb-2 text-[11px] uppercase tracking-wider text-slate-500 font-semibold"
                >
                    Menu Utama
                </div>


                <!-- DASHBOARD -->
                <Link
                    href="/admin/dashboard"
                    :class="[
                        'flex items-center gap-3 px-3 py-2.5 rounded-lg transition group',
                        isActive('/admin/dashboard')
                            ? 'bg-blue-600 text-white'
                            : 'hover:bg-white/5 hover:text-white'
                    ]"
                    title="Dashboard"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="text-sm"
                    >
                        Dashboard
                    </span>

                </Link>


                <!-- MASTER DATA -->
                <button
                    @click="toggleMenu('master')"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/5 hover:text-white transition"
                    title="Data Utama"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="flex-1 text-left text-sm"
                    >
                        Data Utama
                    </span>

                    <svg
                        v-if="!sidebarCollapsed"
                        :class="[
                            'w-4 h-4 transition',
                            openMenus.master ? 'rotate-180' : ''
                        ]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <!-- MASTER SUBMENU -->
                <div
                    v-if="openMenus.master && !sidebarCollapsed"
                    class="ml-8 space-y-1"
                >

                    <Link
                        href="/admin/users"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Pengguna
                    </Link>

                    <Link
                        href="/admin/categories"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Kategori
                    </Link>

                    <Link
                        href="/admin/products"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Produk
                    </Link>

                </div>


                <!-- TRANSAKSI -->
                <button
                    @click="toggleMenu('transaksi')"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/5 hover:text-white transition"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 14l6-6m-5-4h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h1"
                        />
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="flex-1 text-left text-sm"
                    >
                        Transaksi
                    </span>

                    <svg
                        v-if="!sidebarCollapsed"
                        :class="[
                            'w-4 h-4 transition',
                            openMenus.transaksi ? 'rotate-180' : ''
                        ]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <!-- TRANSAKSI SUBMENU -->
                <div
                    v-if="openMenus.transaksi && !sidebarCollapsed"
                    class="ml-8 space-y-1"
                >

                    <Link
                        href="/admin/orders"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Pesanan
                    </Link>

                    <Link
                        href="/admin/payments"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Pembayaran
                    </Link>

                </div>


                <!-- LAPORAN -->
                <button
                    @click="toggleMenu('laporan')"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/5 hover:text-white transition"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 17v-2m3 2v-6m3 6V7M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"
                        />
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="flex-1 text-left text-sm"
                    >
                        Laporan
                    </span>

                    <svg
                        v-if="!sidebarCollapsed"
                        :class="[
                            'w-4 h-4 transition',
                            openMenus.laporan ? 'rotate-180' : ''
                        ]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <!-- LAPORAN SUBMENU -->
                <div
                    v-if="openMenus.laporan && !sidebarCollapsed"
                    class="ml-8 space-y-1"
                >

                    <Link
                        href="/admin/reports/sales"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Laporan Penjualan
                    </Link>

                    <Link
                        href="/admin/reports/users"
                        class="block px-3 py-2 text-sm rounded-md hover:bg-white/5 hover:text-white"
                    >
                        Laporan Pengguna
                    </Link>

                </div>


                <!-- SETTINGS LABEL -->
                <div
                    v-if="!sidebarCollapsed"
                    class="px-3 pt-5 pb-2 text-[11px] uppercase tracking-wider text-slate-500 font-semibold"
                >
                    Sistem
                </div>


                <!-- SETTINGS -->
                <Link
                    href="/admin/settings"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/5 hover:text-white transition"
                    title="Pengaturan"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10.3 4.1l.6-1.1a1.2 1.2 0 012.1 0l.6 1.1a8.2 8.2 0 012.1.9l1.2-.4a1.2 1.2 0 011.5.7l.5 1.2a1.2 1.2 0 01-.4 1.5l-1 .8c.1.7.1 1.4 0 2.1l1 .8a1.2 1.2 0 01.4 1.5l-.5 1.2a1.2 1.2 0 01-1.5.7l-1.2-.4a8.2 8.2 0 01-2.1.9l-.6 1.1a1.2 1.2 0 01-2.1 0l-.6-1.1a8.2 8.2 0 01-2.1-.9l-1.2.4a1.2 1.2 0 01-1.5-.7l-.5-1.2a1.2 1.2 0 01.4-1.5l1-.8a8.2 8.2 0 010-2.1l-1-.8a1.2 1.2 0 01-.4-1.5l.5-1.2a1.2 1.2 0 011.5-.7l1.2.4a8.2 8.2 0 012.1-.9z"
                        />
                        <circle cx="12" cy="12" r="3"/>
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="text-sm"
                    >
                        Pengaturan
                    </span>

                </Link>

            </nav>


            <!-- LOGOUT -->
            <div class="border-t border-white/10 p-3">

                <button
                    @click="logout"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-400 hover:bg-red-500/10 hover:text-red-300 transition"
                    title="Keluar"
                >

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6a2 2 0 012 2v1"
                        />
                    </svg>

                    <span
                        v-if="!sidebarCollapsed"
                        class="text-sm"
                    >
                        Keluar
                    </span>

                </button>

            </div>

        </aside>


        <!-- MAIN AREA -->
        <div
            :class="[
                'min-h-screen transition-all duration-300',
                sidebarCollapsed ? 'lg:pl-20' : 'lg:pl-64'
            ]"
        >

            <!-- TOP NAVBAR -->
            <header class="h-16 bg-white border-b border-slate-200 sticky top-0 z-30">

                <div class="h-full flex items-center px-4 sm:px-6">

                    <!-- MOBILE MENU -->
                    <button
                        @click="sidebarOpen = true"
                        class="lg:hidden p-2 rounded-lg hover:bg-slate-100 text-slate-600"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>


                    <!-- DESKTOP COLLAPSE -->
                    <button
                        @click="sidebarCollapsed = !sidebarCollapsed"
                        class="hidden lg:flex p-2 rounded-lg hover:bg-slate-100 text-slate-600"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>


                    <!-- PAGE TITLE -->
                    <div class="ml-3">
                        <h1 class="font-semibold text-slate-800">
                            {{ title }}
                        </h1>

                        <p class="hidden sm:block text-xs text-slate-500">
                            Panel Administrasi
                        </p>
                    </div>


                    <!-- RIGHT -->
                    <div class="ml-auto flex items-center gap-2 sm:gap-4">

                        <Link
                            href="/"
                            class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-100"
                        >
                            <span>←</span>
                            Landing Page Menu
                        </Link>


                        <div class="h-8 w-px bg-slate-200 hidden sm:block"></div>


                        <!-- USER -->
                        <div class="flex items-center gap-2">

                            <div
                                class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold"
                            >
                                {{ user?.name?.charAt(0)?.toUpperCase() || 'A' }}
                            </div>

                            <div class="hidden md:block">
                                <p class="text-sm font-medium text-slate-700">
                                    {{ user?.name || 'Administrator' }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    Administrator
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <main class="p-4 sm:p-6 lg:p-8">

                <!-- BREADCRUMB / PAGE HEADER -->
                <div class="mb-6">

                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                        <Link
                            href="/admin/dashboard"
                            class="hover:text-blue-600"
                        >
                            Admin
                        </Link>

                        <span>/</span>

                        <span class="text-slate-700">
                            {{ title }}
                        </span>
                    </div>

                    <h2 class="text-2xl font-semibold text-slate-900">
                        {{ title }}
                    </h2>

                </div>


                <!-- PAGE CONTENT -->
                <slot />

            </main>

        </div>

    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>