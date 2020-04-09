<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trade extends Model
{
    protected $fillable = [
        'name', 'price', 'users_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
