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
        return $this->belongsTo(Kategori::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function mitra(){
        return $this->belongsTo(Mitra::class);
    }
    public function ruanglingkup(){
        return $this->hasMany('App\Models\RuangLingkup');
    }
    public function prodi(){
        return $this->hasMany(Prodi::class,'id');
    }
    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}
