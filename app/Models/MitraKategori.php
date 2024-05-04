<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraKategori extends Model
{
    protected $table = 'mitra_kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'mitrakategori',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(pengajuan::class, 'mitraKategori_id', 'id');
    }
}
