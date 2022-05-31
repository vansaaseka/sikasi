<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trxstatus extends Model
{
    public $timestamps = true;
    protected $table = 'trxstatus';
    protected $guarded = [];
    protected $fillable = ['pengajuan_id', 'status_id', 'created_by', 'catatan', 'status_dokumen', 'creates_at' , 'update_at'];
    use HasFactory;
}
