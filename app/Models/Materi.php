<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'materis';
    
    public function student(){
        return $this->belongsTo('App\Models\User');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
