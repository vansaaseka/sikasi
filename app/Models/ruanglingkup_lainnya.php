<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruanglingkup_lainnya extends Model
{
    use HasFactory;
    protected $fillable = ['ruanglingkup_id', 'nama', 'lainnya'];

    public function ruanglingkup(){
        return $this->belongsTo(RuangLingkup::class, 'id');
    }
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id');
    }

}
