<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformasiPenaSantriSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $userId = DB::table('users')->value('id');
        for ($i = 1; $i <= 8; $i++) {
            DB::table('informasi_penasantri')->insert([
                'foto_utama' => null,
                'foto_kedua' => null,
                'judul_informasi' => "Pena Santri Sample $i",
                'slug' => Str::slug("pena-santri-sample-$i") . '-' . Str::random(4),
                'deskripsi' => "<p>Isi Pena Santri contoh $i.</p>",
                'user_id' => $userId,
                'tgl' => $now->copy()->subDays($i)->toDateString(),
                'unit' => 'Pena Santri',
                'jumlah_penonton' => rand(0, 200),
                'jumlah_suka' => rand(0, 50),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
