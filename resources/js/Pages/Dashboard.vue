<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Portal Anggota" />
    <UserLayout :title="'Halo, ' + $page.props.auth.user.name">
        <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-slate-100">
            <h3 class="font-bold text-lg text-slate-900 mb-2">StatZ how are you calling meus Keaktifan Himpunan</h3>
            <p class="text-sm text-slate-500">Anda saat ini terdaftar sebagai anggota aktif angkatan Teknologi Pertambangan PEPB.</p>
        </div>
    </UserLayout>
</template>