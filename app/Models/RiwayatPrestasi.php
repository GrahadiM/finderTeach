<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPrestasi extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'riwayat_prestasis';

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
}
