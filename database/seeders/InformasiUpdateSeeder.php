<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformasiUpdateSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 3; $i++) {
            DB::table('informasi_update')->insert([
                'foto_utama' => null,
                'foto_kedua' => null,
                'judul_informasi' => "Update Sample $i",
                'slug' => Str::slug("update-sample-$i") . '-' . Str::random(4),
                'deskripsi' => "Berita update contoh $i.",
                'user_id' => null,
                'tgl' => $now->subDays($i)->toDateString(),
                'unit' => 'Update',
                'jumlah_penonton' => rand(0, 200),
                'jumlah_suka' => rand(0, 50),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
