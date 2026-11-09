<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiAdministrasi extends Model
{
    use HasFactory;

    protected $table = 'informasi_administrasi';

    protected $fillable = [
        'foto_utama','foto_kedua','judul_informasi','slug','deskripsi','user_id','tgl','unit','jumlah_penonton','jumlah_suka'
    ];

    public function user() { return $this->belongsTo(User::class); }
}
