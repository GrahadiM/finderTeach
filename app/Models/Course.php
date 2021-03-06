<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'courses';
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
}
