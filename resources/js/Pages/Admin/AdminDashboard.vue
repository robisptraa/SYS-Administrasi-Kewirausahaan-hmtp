<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: AdminLayout,
});
</script>

<template>
    <Head title="Dashboard Admin" />

    <div class="space-y-6">

        <!-- WELCOME -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 sm:p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <p class="text-sm text-slate-500">
                        Selamat datang kembali 👋
                    </p>

                    <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 mt-1">
                        {{ $page.props.auth.user?.name || 'Administrator' }}
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Berikut ringkasan informasi sistem Anda hari ini.
                    </p>
                </div>

                <div class="text-sm text-slate-500">
                    {{ new Date().toLocaleDateString('id-ID', {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }) }}
                </div>

            </div>
        </div>


        <!-- STATISTICS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

            <!-- USERS -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Total Pengguna
                        </p>

                        <h3 class="text-2xl font-bold text-slate-900 mt-2">
                            150
                        </h3>

                        <p class="text-xs text-emerald-600 mt-2">
                            ↑ 12% bulan ini
                        </p>
                    </div>

                    <div class="w-11 h-11 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                        👥
                    </div>

                </div>

            </div>


            <!-- PRODUCTS -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Total Produk
                        </p>

                        <h3 class="text-2xl font-bold text-slate-900 mt-2">
                            53
                        </h3>

                        <p class="text-xs text-emerald-600 mt-2">
                            ↑ 8% bulan ini
                        </p>
                    </div>

                    <div class="w-11 h-11 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center">
                        📦
                    </div>

                </div>

            </div>


            <!-- ORDERS -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Pesanan
                        </p>

                        <h3 class="text-2xl font-bold text-slate-900 mt-2">
                            44
                        </h3>

                        <p class="text-xs text-amber-600 mt-2">
                            5 masih diproses
                        </p>
                    </div>

                    <div class="w-11 h-11 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center">
                        🛒
                    </div>

                </div>

            </div>


            <!-- REVENUE -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Pendapatan
                        </p>

                        <h3 class="text-2xl font-bold text-slate-900 mt-2">
                            Rp 6,5 Jt
                        </h3>

                        <p class="text-xs text-emerald-600 mt-2">
                            ↑ 15% bulan ini
                        </p>
                    </div>

                    <div class="w-11 h-11 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center">
                        💰
                    </div>

                </div>

            </div>

        </div>


        <!-- CONTENT GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- CHART -->
            <div class="xl:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm">

                <div class="p-5 border-b border-slate-200">

                    <h3 class="font-semibold text-slate-900">
                        Aktivitas Sistem
                    </h3>

                    <p class="text-xs text-slate-500 mt-1">
                        Ringkasan aktivitas selama 7 hari terakhir
                    </p>

                </div>

                <div class="p-5">

                    <div class="h-64 flex items-end gap-2 sm:gap-4">

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[35%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Sen
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[55%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Sel
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[45%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Rab
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[70%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Kam
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[60%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Jum
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[85%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Sab
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col justify-end h-full">
                            <div class="bg-blue-500 rounded-t-lg h-[65%]"></div>
                            <span class="text-xs text-slate-400 text-center mt-2">
                                Min
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            <!-- QUICK MENU -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

                <div class="p-5 border-b border-slate-200">

                    <h3 class="font-semibold text-slate-900">
                        Akses Cepat
                    </h3>

                    <p class="text-xs text-slate-500 mt-1">
                        Menu yang sering digunakan
                    </p>

                </div>

                <div class="p-4 space-y-2">

                    <a
                        href="/admin/users"
                        class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition"
                    >
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                            👥
                        </div>

                        <div>
                            <p class="text-sm font-medium">
                                Kelola Pengguna
                            </p>

                            <p class="text-xs text-slate-400">
                                Tambah atau ubah pengguna
                            </p>
                        </div>
                    </a>


                    <a
                        href="/admin/products"
                        class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition"
                    >
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center">
                            📦
                        </div>

                        <div>
                            <p class="text-sm font-medium">
                                Kelola Produk
                            </p>

                            <p class="text-xs text-slate-400">
                                Tambah dan kelola produk
                            </p>
                        </div>
                    </a>


                    <a
                        href="/admin/reports/sales"
                        class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition"
                    >
                        <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center">
                            📊
                        </div>

                        <div>
                            <p class="text-sm font-medium">
                                Laporan
                            </p>

                            <p class="text-xs text-slate-400">
                                Lihat laporan sistem
                            </p>
                        </div>
                    </a>

                </div>

            </div>

        </div>


        <!-- RECENT ORDERS -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

            <div class="p-5 border-b border-slate-200">

                <h3 class="font-semibold text-slate-900">
                    Aktivitas Terbaru
                </h3>

                <p class="text-xs text-slate-500 mt-1">
                    Aktivitas terakhir pada sistem
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full min-w-[700px] text-sm">

                    <thead class="bg-slate-50">

                        <tr>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500">
                                Aktivitas
                            </th>

                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500">
                                Pengguna
                            </th>

                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500">
                                Waktu
                            </th>

                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500">
                                Status
                            </th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        <tr class="hover:bg-slate-50">

                            <td class="px-5 py-4">
                                Menambahkan produk baru
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                Admin
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                5 menit lalu
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs">
                                    Berhasil
                                </span>
                            </td>

                        </tr>


                        <tr class="hover:bg-slate-50">

                            <td class="px-5 py-4">
                                Pengguna baru terdaftar
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                Budi
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                15 menit lalu
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                                    Baru
                                </span>
                            </td>

                        </tr>


                        <tr class="hover:bg-slate-50">

                            <td class="px-5 py-4">
                                Pesanan berhasil diproses
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                Admin
                            </td>

                            <td class="px-5 py-4 text-slate-500">
                                30 menit lalu
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs">
                                    Selesai
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</template>