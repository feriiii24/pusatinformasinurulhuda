<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasi_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('judul_informasi');
            $table->string('slug')->nullable()->unique();
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->default('umum'); // umum / tertutup
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->date('tgl')->nullable();
            $table->string('unit')->nullable();
            $table->unsignedBigInteger('jumlah_penonton')->default(0);
            $table->unsignedBigInteger('jumlah_suka')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi_dokumen');
    }
};
