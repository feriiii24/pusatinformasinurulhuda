<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Adds a nullable unique slug column, then backfills slugs from titles.
     */
    public function up()
    {
        Schema::table('informasi_umum', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('judul_informasi');
        });

        // Backfill slugs safely (avoid duplicates)
        $items = DB::table('informasi_umum')->select('id', 'judul_informasi')->get();
        foreach ($items as $item) {
            $base = Str::slug($item->judul_informasi ?: 'informasi-' . $item->id);
            $slug = $base;
            $i = 1;
            while (DB::table('informasi_umum')->where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i;
                $i++;
            }
            DB::table('informasi_umum')->where('id', $item->id)->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('informasi_umum', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
