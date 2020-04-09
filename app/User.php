<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'image', 'email', 'password', 'currencies_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    } 
    public function trade()
    {
        return $this->hasOne(Trade::class);
    }
    public function image(){
        $imagePath=($this->image) ?  $this->image : "";
        return '/storage/' . $imagePath;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'users_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currencies_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'users_id', 'id');
    }
}

