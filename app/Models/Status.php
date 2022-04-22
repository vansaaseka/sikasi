<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'status';
    protected $guarded = [];
    protected $fillable = ['status','catatan'];
}
