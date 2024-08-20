<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role jika belum ada
        $pimpinanRole = Role::firstOrCreate(['name' => 'pimpinan']);
        $bendaharaRole = Role::firstOrCreate(['name' => 'bendahara']);
        $anggotaDewanRole = Role::firstOrCreate(['name' => 'anggota dewan']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);

        // Buat user dan assign role
        $pimpinan = User::create([
            'nama_lengkap' => 'Pimpinan User',
            'email' => 'pimpinan@example.com',
            'password' => Hash::make('password123'),
        ]);
        $pimpinan->assignRole($pimpinanRole);

        $bendahara = User::create([
            'nama_lengkap' => 'Bendahara User',
            'email' => 'bendahara@example.com',
            'password' => Hash::make('password123'),
        ]);
        $bendahara->assignRole($bendaharaRole);

        $anggotaDewan = User::create([
            'nama_lengkap' => 'Anggota Dewan User',
            'email' => 'anggota.dewan@example.com',
            'password' => Hash::make('password123'),
        ]);
        $anggotaDewan->assignRole($anggotaDewanRole);

        $staff = User::create([
            'nama_lengkap' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'),
        ]);
        $staff->assignRole($staffRole);
    }
}
