<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'email', 'experience', 'photo'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
