<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'template';
    protected $fillable = [];
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');

    }


}
