<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class InformasiUmumSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $userId = optional(User::first())->id;
        if (! $userId) {
            // no user exists yet; try to create a simple one
            $user = User::factory()->create(['email' => 'seed-temp-user@example.com']);
            $userId = $user->id;
        }

        for ($i = 1; $i <= 3; $i++) {
            DB::table('informasi_umum')->insert([
                'foto_utama' => null,
                'foto_kedua' => null,
                'judul_informasi' => "Umum Sample $i",
                'slug' => Str::slug("umum-sample-$i") . '-' . Str::random(4),
                'deskripsi' => "<p>Konten umum contoh $i.</p>",
                'user_id' => $userId,
                'tgl' => $now->subDays($i)->toDateString(),
                'unit' => 'Umum',
                'jumlah_penonton' => rand(0, 200),
                'jumlah_suka' => rand(0, 50),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
