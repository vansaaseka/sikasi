<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangLingkup extends Model
{
    public $timestamps = false;
    protected $table = 'ruanglingkup';
    protected $fillable = ['ruanglingkup'];
    protected $guarded = [];
    use HasFactory;
}
