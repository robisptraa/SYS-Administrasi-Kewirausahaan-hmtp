<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@hmtp.com'],
            [
                'name' => 'Admin HMTP',
                'role' => 'admin',
                'password' => Hash::make('password123'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'divisi@hmtp.com'],
            [
                'name' => 'Divisi Kewirausahaan',
                'role' => 'divisi',
                'password' => Hash::make('password123'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'anggota@hmtp.com'],
            [
                'name' => 'Anggota HMTP',
                'role' => 'anggota',
                'password' => Hash::make('password123'),
            ]
        );
    }
}