<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDokumen extends Model
{
    use HasFactory;

    protected $table = 'informasi_dokumen';

    protected $fillable = [
        'file_path',
        'judul_informasi',
        'slug',
        'deskripsi',
        'kategori',
        'user_id',
        'tgl',
        'unit',
        'jumlah_penonton',
        'jumlah_suka',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
