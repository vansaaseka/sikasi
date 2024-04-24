<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'status';
    protected $guarded = [];
    protected $fillable = ['namastatus',];
    use HasFactory;

}

