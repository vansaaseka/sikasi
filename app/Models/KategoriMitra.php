<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMitra extends Model
{
    public $timestamps = false;
    protected $table = 'kategorimitra';
    protected $fillable = ['kategorimitra'];
    protected $guarded = [];
    use HasFactory;
}
