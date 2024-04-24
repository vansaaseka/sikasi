<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuangLingkup extends Model
{
    public $timestamps = false;
    protected $table = 'ruanglingkup';
    protected $fillable = ['ruanglingkup', 'lainnya'];
    protected $guarded = [];

  public function ruanglingkupLainnyas()
    {
        return $this->hasMany(ruanglingkup_lainnya::class, 'ruanglingkup_id');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'ruanglingkup_id');
    }
}
