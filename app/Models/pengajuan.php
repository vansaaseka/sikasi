<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    public $timestamps = true;
    protected $table = 'pengajuan';
    protected $fillable = ['user_id', 'kategori_id' , 'mitra_id' , 'ruanglingkup_id', 'proditerlibat_id' , 'status_id', 'tanggalmulai' , 'tanggalakhir', 'nomordokumen', 'dokumen'];
    protected $guarded = [];
    use HasFactory;

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function mitra(){
        return $this->belongsTo('App\Models\Mitra');
    }
    public function ruanglingkup(){
        return $this->belongsTo('App\Models\RuangLingkup');
    }
    public function Prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }
    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}
