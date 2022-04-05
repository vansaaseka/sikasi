<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;
    protected $table = 'profile';
    protected $fillable = ['user_id', 'photo' , 'prodi' , 'alamat'];
    protected $guarded = [];
    use HasFactory;

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');

    }
}
