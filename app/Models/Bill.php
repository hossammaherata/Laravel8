<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
     public function orders(){
        return $this->hasMany(Order::class, 'bill_id', 'id');
    }


}
