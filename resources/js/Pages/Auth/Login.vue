<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Masuk - SYS Administrasi Kewirausahaan" />

    <div class="min-h-screen bg-slate-50 flex flex-col justify-center items-center p-4 sm:p-6 lg:p-8 font-sans antialiased relative overflow-hidden">
        <!-- Ornamen Latar Belakang Estetik -->
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-red-750 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
        </div>

        <!-- Container Utama Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-100 overflow-hidden relative z-10 transition duration-300 hover:shadow-2xl">
            <!-- Aksen Garis Gradasi Atas -->
            <div class="h-2 bg-gradient-to-r from-red-700 via-red-800 to-amber-500"></div>

            <div class="p-8 sm:p-10">
                <!-- Identitas & Logo Ringkas -->
                <div class="text-center mb-8">
                    <Link href="/" class="inline-flex w-14 h-14 bg-red-700 rounded-full items-center justify-center text-white font-bold shadow-md border-2 border-amber-400 mx-auto mb-4 hover:scale-105 transition transform">
                        <span class="text-xs">HMTP</span>
                    </Link>
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Selamat Datang Kembali</h2>
                    <p class="text-sm text-slate-500 mt-1">SYS Administrasi Kewirausahaan</p>
                </div>

                <!-- Banner Status Flash dari Laravel -->
                <div v-if="status" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-sm font-medium text-emerald-600">
                    {{ status }}
                </div>

                <!-- Form Login -->
                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Alamat Email</label>
                        <div class="relative">
                            <input 
                                id="email" 
                                type="email" 
                                v-model="form.email" 
                                required 
                                autofocus 
                                autocomplete="username"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                                placeholder="nama@mahasiswa.com"
                            />
                        </div>
                        <span v-if="form.errors.email" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.email }}</span>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600">Kata Sandi</label>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            v-model="form.password" 
                            required 
                            autocomplete="current-password"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                            placeholder="••••••••"
                        />
                        <span v-if="form.errors.password" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.password }}</span>
                    </div>

                    <!-- Ingat Saya / Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center group cursor-pointer">
                            <input 
                                type="checkbox" 
                                v-model="form.remember" 
                                class="w-4 h-4 rounded text-red-700 border-slate-300 focus:ring-red-600/20 transition cursor-pointer"
                            />
                            <span class="ml-2.5 text-sm text-slate-500 group-hover:text-slate-700 transition select-none">Ingat perangkat ini</span>
                        </label>
                    </div>

                    <!-- Tombol Masuk -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            :class="{ 'opacity-50 pointer-events-none': form.processing }"
                            class="w-full py-3.5 px-4 bg-red-700 hover:bg-red-800 text-white font-bold text-sm rounded-xl shadow-lg shadow-red-700/10 transition transform hover:-translate-y-0.5 active:translate-y-0"
                        >
                            Masuk Aplikasi
                        </button>
                    </div>
                </form>

                <!-- Footer Card Pindah Halaman -->
                <div class="mt-8 text-center pt-6 border-t border-slate-100 text-sm text-slate-500">
                    Belum memiliki akun? 
                    <Link href="/register" class="font-bold text-red-750 hover:text-red-800 transition ml-1">Daftar Sekarang</Link>
                </div>
            </div>
        </div>

        <!-- Footer Hak Cipta Luar -->
        <p class="mt-8 text-xs text-slate-400 text-center relative z-10">
            © 2026 HMTP PEPB. All Rights Reserved.
        </p>
    </div>
</template>