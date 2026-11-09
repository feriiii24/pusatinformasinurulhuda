<?php

namespace Database\Seeders;

use App\Models\InformasiDokumen;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class InformasiDokumenSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // gunakan user pertama (biasanya admin) jika tersedia
        $admin = User::first();

        // pastikan folder storage/app/dokumen ada
        Storage::makeDirectory('dokumen');

        for ($i = 1; $i <= 15; $i++) {
            $judul = $faker->sentence(mt_rand(3, 7));
            $filename = 'dokumen/sample-' . $i . '.pdf';

            // isi placeholder sederhana (bukan PDF valid, namun cukup sebagai file contoh)
            $content = "Sample PDF placeholder $i";
            Storage::put($filename, $content);

            InformasiDokumen::create([
                'file_path' => $filename,
                'judul_informasi' => $judul,
                'slug' => Str::slug($judul) . '-' . $i,
                'deskripsi' => $faker->paragraphs(mt_rand(1,3), true),
                'kategori' => $i % 4 === 0 ? 'tertutup' : 'umum',
                'user_id' => $admin?->id,
                'tgl' => $faker->date(),
                'unit' => $faker->company(),
                'jumlah_penonton' => $faker->numberBetween(0, 500),
                'jumlah_suka' => $faker->numberBetween(0, 200),
            ]);
        }
    }
}
