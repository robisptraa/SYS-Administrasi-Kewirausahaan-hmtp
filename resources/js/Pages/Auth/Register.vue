<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Daftar Akun - SYS Administrasi Kewirausahaan" />

    <div class="min-h-screen bg-slate-50 flex flex-col justify-center items-center p-4 sm:p-6 lg:p-8 font-sans antialiased relative overflow-hidden">
        <!-- Ornamen Latar Belakang Estetik -->
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-red-750 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
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
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Pendaftaran Akun Baru</h2>
                    <p class="text-sm text-slate-500 mt-1">Bergabung dengan platform internal Kewirausahaan</p>
                </div>

                <!-- Form Registrasi -->
                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Input Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Nama Lengkap</label>
                        <input 
                            id="name" 
                            type="text" 
                            v-model="form.name" 
                            required 
                            autofocus 
                            autocomplete="name"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                            placeholder="Masukkan nama lengkap Anda"
                        />
                        <span v-if="form.errors.name" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.name }}</span>
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Alamat Email Resmi</label>
                        <input 
                            id="email" 
                            type="email" 
                            v-model="form.email" 
                            required 
                            autocomplete="username"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                            placeholder="nama@mahasiswa.com"
                        />
                        <span v-if="form.errors.email" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.email }}</span>
                    </div>

                    <!-- Input Kata Sandi -->
                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Buat Kata Sandi</label>
                        <input 
                            id="password" 
                            type="password" 
                            v-model="form.password" 
                            required 
                            autocomplete="new-password"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                            placeholder="Minimal 8 karakter"
                        />
                        <span v-if="form.errors.password" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.password }}</span>
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Ulangi Kata Sandi</label>
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            v-model="form.password_confirmation" 
                            required 
                            autocomplete="new-password"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:bg-white focus:ring-2 focus:ring-red-600/20 focus:border-red-700 outline-none transition"
                            placeholder="••••••••"
                        />
                        <span v-if="form.errors.password_confirmation" class="block text-xs font-medium text-red-600 mt-1.5">{{ form.errors.password_confirmation }}</span>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            :class="{ 'opacity-50 pointer-events-none': form.processing }"
                            class="w-full py-3.5 px-4 bg-red-700 hover:bg-red-800 text-white font-bold text-sm rounded-xl shadow-lg shadow-red-700/10 transition transform hover:-translate-y-0.5 active:translate-y-0"
                        >
                            Buat Akun Sekarang
                        </button>
                    </div>
                </form>

                <!-- Footer Card Pindah Halaman -->
                <div class="mt-8 text-center pt-6 border-t border-slate-100 text-sm text-slate-500">
                    Sudah terdaftar sebelumnya? 
                    <Link href="/login" class="font-bold text-red-750 hover:text-red-800 transition ml-1">Masuk di sini</Link>
                </div>
            </div>
        </div>

        <!-- Footer Hak Cipta Luar -->
        <p class="mt-8 text-xs text-slate-400 text-center relative z-10">
            © 2026 HMTP PEPB. All Rights Reserved.
        </p>
    </div>
</template>