<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    public $timestamps = true;
    protected $table = 'pengajuan';
    protected $fillable = ['user_id', 'kategori_id' , 'mitra_id' ,'lainnya_id', 'ruanglingkup_id', 'proditerlibat_id' , 'status_id', 'tanggalmulai' , 'tanggalakhir', 'nomordokumen', 'dokumen', 'prodiid'];
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
    public function ruanglingkup()
    {
        return $this->hasMany(RuangLingkup::class, 'id');
    }

    public function prodi(){
        return $this->hasMany(Prodi::class,'id');
    }
    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

    public function lainnya()
    {
        return $this->hasOne(ruanglingkup_lainnya::class,'id', 'lainnya_id');
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'pengajuan_id');
    }

    public function mitraKategori()
    {
        return $this->belongsTo(MitraKategori::class, 'mitraKategori_id', 'id');
    }
}
