<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'riwayat_pendidikans';

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
}
