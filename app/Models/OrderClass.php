<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderClass extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'order_classes';
    
    public function student(){
        return $this->belongsTo('App\Models\User');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
}
