<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformasiAkademikSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        // assign a valid user_id if a user exists
        $userId = DB::table('users')->value('id');
        for ($i = 1; $i <= 8; $i++) {
            DB::table('informasi_akademik')->insert([
                'foto_utama' => null,
                'foto_kedua' => null,
                'judul_informasi' => "Akademik Sample $i",
                'slug' => Str::slug("akademik-sample-$i") . '-' . Str::random(4),
                'deskripsi' => "<p>Ini adalah contoh deskripsi akademik nomor $i.</p>\n<p>Paragraf kedua contoh.</p>",
                'user_id' => $userId,
                'tgl' => $now->copy()->subDays($i)->toDateString(),
                'unit' => 'Akademik',
                'jumlah_penonton' => rand(0, 200),
                'jumlah_suka' => rand(0, 50),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
