<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'pengajuan_id',
        'judulKerjasama',
        'refrensiKerjasama',
        'mitraKerjasama',
        'ruangLingkup',
        'hasilPelaksanaan',
        'linkDokumen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
