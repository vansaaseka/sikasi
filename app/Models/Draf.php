<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draf extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [];
    protected $table = 'draf';
    protected $guarded = [];

    // public function kategori()
    // {
    //     return $this->belongsTo('App\Models\Kategori');
    // }
}