<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public $timestamps = false;
    protected $table = 'prodis';
    protected $fillable = ['namaprodi'];
    protected $guarded = [];
    use HasFactory;

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'proditerlibat_id');
    }
}
