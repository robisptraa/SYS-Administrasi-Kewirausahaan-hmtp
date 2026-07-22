<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
        default: true,
    },
    canRegister: {
        type: Boolean,
        default: true,
    },
});

// Data dummy untuk Statistik
const stats = [
    { id: 1, count: '12', label: 'Total Anggota', icon: 'users', color: 'text-red-600 bg-red-50' },
    { id: 2, count: '5', label: 'Program Kerja', icon: 'briefcase', color: 'text-emerald-600 bg-emerald-50' },
    { id: 3, count: '20', label: 'Total Produk', icon: 'box', color: 'text-amber-600 bg-amber-50' },
    { id: 4, count: '6', label: 'Mitra Kerja', icon: 'graduation-cap', color: 'text-indigo-600 bg-indigo-50' },
];

// Data dummy untuk Kategori Management Tools
const tools = [
    {
        id: 1,
        title: 'KEDAI HMTP SISTEM KASIR',
        description: 'Sistem manajemen transaksi penjualan retail terintegrasi untuk internal kedai Himpunan Mahasiswa Teknologi Pertambangan.',
        tag: 'Management Tools',
    },
    {
        id: 2,
        title: 'KEDAI HMTP',
        description: 'Platform utama inventarisasi, pengelolaan stok barang, dan pelaporan keuangan berkala Divisi Kewirausahaan.',
        tag: 'Management Tools',
    },
];

const scrollToSection = (id) => {
    const element = document.getElementById(id);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
};

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<template>
    <Head title="Welcome - SYS Administrasi Kewirausahaan" />

    <div class="min-h-screen bg-slate-50 text-slate-800 font-sans antialiased selection:bg-red-600 selection:text-white">
        
        <!-- TOP BAR: Info Alamat -->
        <div class="bg-amber-600 text-white text-xs py-2 px-4 shadow-inner hidden md:block">
            <div class="max-w-7xl mx-auto flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>Jalan Jenderal Sudirman Nomor 623, Kota Bandung 40211</span>
            </div>
        </div>

        <!-- NAVBAR -->
        <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur shadow-sm border-b border-slate-100 transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                <!-- Logo & Identitas -->
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-red-700 rounded-full flex items-center justify-center text-white font-bold shadow-md border-2 border-amber-400 overflow-hidden">
                        <!-- Ganti dengan tag <img> asli jika file logo sudah siap -->
                        <span class="text-xs">HMTP</span>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-sm sm:text-base leading-tight">Himpunan Mahasiswa</h1>
                        <p class="text-xs text-red-700 font-semibold tracking-wide">Teknologi Pertambangan PEPB</p>
                    </div>
                </div>

                <!-- Menu Auth (Laravel Breeze Integration) -->
                <div v-if="canLogin" class="flex items-center gap-3">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="px-5 py-2.5 rounded-xl bg-slate-900 text-white font-medium text-sm shadow-md hover:bg-slate-800 transition transform hover:-translate-y-0.5">
                        Dashboard App
                    </Link>

                    <template v-else>
                        <Link :href="route('login')" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-red-700 transition">
                            Masuk
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" class="px-5 py-2.5 rounded-xl bg-red-700 text-white font-medium text-sm shadow-md hover:bg-red-800 transition transform hover:-translate-y-0.5">
                            Daftar Akun
                        </Link>
                    </template>
                </div>
            </div>
        </nav>

        <!-- HERO SECTION -->
        <header class="relative bg-gradient-to-br from-red-700 via-red-800 to-amber-900 text-white overflow-hidden pb-32 pt-20 md:pb-40 md:pt-28">
            <!-- Ornamen Estetik Background -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute -top-10 -right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-10 w-80 h-80 bg-amber-400 rounded-full blur-3xl"></div>
            </div>

            <div class="relative max-w-5xl mx-auto px-4 text-center">
                <!-- Badge Sistem -->
                <div class="inline-flex items-center gap-2 bg-black/20 backdrop-blur border border-white/10 px-4 py-1.5 rounded-full text-xs font-medium text-amber-300 tracking-wider uppercase mb-6 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/></svg>
                    Sistem Administrasi Kewirausahaan
                </div>

                <!-- Judul Utama -->
                <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-sm">
                    Departemen Kewirausahaan
                </h2>
                <h3 class="text-xl sm:text-3xl font-bold text-amber-400 mb-2">
                    Himpunan Mahasiswa Teknologi Pertambangan
                </h3>
                <p class="text-sm sm:text-lg text-red-100/90 font-medium max-w-2xl mx-auto mb-6">
                    Politeknik Energi & Pertambangan Bandung
                </p>

                <!-- Slogan Internal -->
                <p class="text-xs sm:text-sm italic text-amber-200/80 bg-white/5 inline-block px-4 py-2 rounded-lg border border-white/5 mb-8">
                    "Salam tambang, Hidup tambang, Jaya HMTP!"
                </p>

                <!-- Akses Cepat Tombol -->
                <div>
                    <button @click="scrollToSection('management-tools')" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-900 font-semibold px-6 py-3.5 rounded-xl shadow-lg shadow-amber-600/20 transition transform hover:-translate-y-0.5 active:translate-y-0 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform group-hover:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                        Kategori Management Tools
                    </button>
                </div>
            </div>
        </header>

        <!-- STATS CARDS BLOCK (Overlapping Hero) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div v-for="stat in stats" :key="stat.id" class="bg-white rounded-2xl p-5 sm:p-6 shadow-xl shadow-slate-200/80 border border-slate-100 flex flex-col items-center text-center group hover:shadow-2xl hover:border-red-100 transition duration-300">
                    <div :class="['w-12 h-12 rounded-xl flex items-center justify-center mb-4 transition transform group-hover:scale-110', stat.color]">
                        <!-- Dynamic inline SVG selection using v-if framework -->
                        <svg v-if="stat.icon === 'users'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <svg v-if="stat.icon === 'briefcase'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                        <svg v-if="stat.icon === 'box'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l-7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.29 7 12 12 20.71 7"/><line x1="12" y1="22" x2="12" y2="12"/></svg>
                        <svg v-if="stat.icon === 'graduation-cap'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M6 18.8v-4L2 13"/></svg>
                    </div>
                    <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-1">
                        {{ stat.count }}
                    </span>
                    <span class="text-xs sm:text-sm font-medium text-slate-500">
                        {{ stat.label }}
                    </span>
                </div>
            </div>
        </section>

        <!-- MANAGEMENT TOOLS SECTION -->
        <main id="management-tools" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <!-- Header Section -->
            <div class="flex items-center gap-4 mb-12">
                <div class="w-1.5 h-10 bg-red-700 rounded-full"></div>
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 tracking-tight">Kategori Management Tools</h3>
                    <p class="text-sm text-slate-500">Himpunan Mahasiswa Teknologi Pertambangan PEPB</p>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <article v-for="tool in tools" :key="tool.id" class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:border-slate-200 transition duration-300">
                    
                    <!-- Media Placeholder Modern Canvas -->
                    <div class="h-48 bg-gradient-to-br from-slate-100 to-slate-200 relative flex items-center justify-center p-6 text-center overflow-hidden">
                        <div class="absolute inset-0 opacity-40 mix-blend-overlay bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:16px_16px]"></div>
                        <span class="text-xs font-bold tracking-wider text-slate-400 uppercase bg-white/80 backdrop-blur px-3 py-1.5 rounded-full shadow-sm z-10">
                            {{ tool.title }} Preview Image
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold text-red-700 tracking-wider uppercase inline-block mb-3">
                                {{ tool.tag }}
                            </span>
                            <h4 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-700 transition">
                                {{ tool.title }}
                            </h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                {{ tool.description }}
                            </p>
                        </div>

                        <!-- Card Actions Footer -->
                        <div class="flex items-center justify-between pt-4 border-t border-slate-150">
                            <Link :href="route('login')" class="inline-flex items-center gap-2 text-sm font-bold text-white bg-red-700 hover:bg-red-800 px-5 py-2.5 rounded-xl transition shadow-md shadow-red-700/10">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </Link>

                            <button class="p-2.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition" title="Simpan ke Bookmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="bg-gradient-to-b from-red-950 to-slate-950 text-slate-300 relative pt-16 pb-8 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 pb-12 border-b border-white/10">
                    
                    <!-- Kolom Identitas -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-red-900 font-bold shadow-md">
                                M
                            </div>
                            <h4 class="text-lg font-bold text-white tracking-wide">
                                Himpunan Mahasiswa Teknologi Pertambangan PEPB
                            </h4>
                        </div>
                        <p class="text-sm text-slate-400 max-w-xl leading-relaxed">
                            Bersama membangun insan pertambangan yang profesional, berkarakter, dan berdedikasi untuk kemajuan bangsa.
                        </p>
                    </div>

                    <!-- Kolom Kontak / Alamat -->
                    <div class="space-y-3 text-sm">
                        <h5 class="font-semibold text-white tracking-wide uppercase text-xs text-amber-400">Sekretariat</h5>
                        <div class="flex items-start gap-2 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span>Jalan Jenderal Sudirman Nomor 623, Kota Bandung 40211</span>
                        </div>
                    </div>
                </div>

                <!-- Copyright & Tombol Back to Top -->
                <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                    <p>© 2026 Himpunan Mahasiswa Teknologi Pertambangan PEPB. Hak Cipta Dilindungi.</p>
                    
                    <button @click="scrollToTop" class="inline-flex items-center justify-center w-10 h-10 bg-white/5 hover:bg-red-700 hover:text-white rounded-xl transition text-slate-400 border border-white/10" title="Kembali ke atas">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                    </button>
                </div>
            </div>
        </footer>

    </div>
</template>