<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{   public $timestamps = false;
    protected $table = 'mitra';
    protected $fillable = ['namamitra','nomor', 'namadagangmitra' , 'logo' , 'kategorimitra_id', 'alamat', 'email','website','sosmed' , 'namapenandatangan' , 'jabatanpenandatangan', 'narahubung' , 'no_hp'];
    protected $guarded = [];
    use HasFactory;

    public function kategorimitra(){
        return $this->belongsTo('App\Models\KategoriMitra');
    }
}
