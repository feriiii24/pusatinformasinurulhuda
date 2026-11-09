<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seed roles dan units
        $this->call([
            RoleSeeder::class,
            UnitSeeder::class,
        ]);

        // ambil role super admin
        $superAdmin = Role::where('name', 'super admin')->first();

        // ambil unit Yayasan
        $yayasan = Unit::where('name', 'Yayasan Pondok Pesantren Nurul Huda Sukaraja')->first();

        // buat user default (jika belum ada)
        $adminEmail = 'adminpinha@gmail.com';
        $existing = User::where('email', $adminEmail)->first();
        if (! $existing) {
            User::factory()->create([
                'name' => 'Admin Pinha',
                'email' => $adminEmail,
                'role_id' => $superAdmin->id,
                'unit_id' => $yayasan?->id, // kalau ada assign, kalau tidak null
            ]);
        } else {
            // ensure role/unit set if missing
            $existing->role_id = $existing->role_id ?? $superAdmin->id;
            $existing->unit_id = $existing->unit_id ?? $yayasan?->id;
            $existing->save();
        }

        // seed sample informasi data
        $this->call([
            InformasiUmumSeeder::class,
            InformasiAkademikSeeder::class,
            InformasiAdministrasiSeeder::class,
            InformasiPenaSantriSeeder::class,
            InformasiKegiatanSeeder::class,
            InformasiMasyarakatSeeder::class,
            InformasiUpdateSeeder::class,
            InformasiDokumenSeeder::class,
        ]);
    }
}
