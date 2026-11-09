<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Yayasan Pondok Pesantren Nurul Huda Sukaraja'],
            ['name' => 'Universitas Nurul Huda Sukaraja'],
            ['name' => 'Sekolah Menengah Kejuruan Nurul Huda Sukaraja'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
