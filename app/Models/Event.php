<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    public  function users()
    {
        return $this->belongsToMany(User::class,UserEvent::class,'event_id','user_id');
    }
     public function details(){
          return $this->hasMany(UserEvent::class,'event_id','id');
      }
}
