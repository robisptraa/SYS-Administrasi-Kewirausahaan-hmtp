<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Test Admin" />

    <AdminLayout :title="'Halo, ' + ($page.props.auth.user?.name || 'Admin')">
        <div class="p-8 bg-slate-100 min-h-screen rounded-xl border border-slate-200 shadow-sm">
            <h1 class="text-2xl font-bold text-red-700">Koneksi Sukses: Ini Halaman Admin!</h1>
            <p class="text-sm text-slate-600 mt-2">
                Backend, routing, dan komponen frontend Anda kini telah terhubung sempurna tanpa ada data session yang bocor atau crash.
            </p>
        </div>
    </AdminLayout>
</template>