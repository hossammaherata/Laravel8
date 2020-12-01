<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function bills(){
        return $this->hasMany(Bill::class, 'user_id', 'id');
    }
       public function owner(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function paids(){
        return $this->hasMany(Paid::class, 'user_id', 'id');
    }

      public function orders(){
        return $this->hasManyThrough(Order::class,Bill::class,'user_id','bill_id');


        }
        //   public function details(){
        // return $this->hasManyThrough(OrderProduct::class,Order::class,'user_id','order_id');


        // }
}
