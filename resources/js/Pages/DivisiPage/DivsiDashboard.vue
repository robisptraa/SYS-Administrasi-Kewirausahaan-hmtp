<script setup>
import UserLayout from '@/Layouts/DivisiLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Test Divisi" />
    <UserLayout :title="'Halo, ' + $page.props.auth.user.name">
        <div class="p-8 bg-slate-100 min-h-screen">
            <h1 class="text-2xl font-bold text-amber-600">Koneksi Sukses: Ini Halaman Divisi!</h1>
            <p class="text-sm text-slate-600 mt-2">Jika halaman ini muncul, berarti layout divisi sebelumnya yang perlu diperbaiki kodenya.</p>
        </div>
    </UserLayout>
</template>