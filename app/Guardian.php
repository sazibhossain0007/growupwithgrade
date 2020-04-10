<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guardian extends Authenticatable
{
    use Notifiable;

    protected $fillable = ["id","name","email","phone","password"];
    
	protected $guard = 'guardian';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
