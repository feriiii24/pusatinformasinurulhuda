<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informasi_umum', function (Blueprint $table) {
            $table->id();
            $table->string('foto_utama')->nullable();   // simpan path foto utama
            $table->string('foto_kedua')->nullable();   // simpan path foto kedua
            $table->string('judul_informasi');          // judul informasi
            $table->text('deskripsi');                  // isi / deskripsi informasi
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // penerbit
            $table->date('tgl');                        // tanggal informasi
            $table->string('unit')->nullable();         // unit terkait
            $table->unsignedBigInteger('jumlah_penonton')->default(0); // view counter
            $table->unsignedBigInteger('jumlah_suka')->default(0);     // like counter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umum');
    }
};
