<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'alc_usuarios';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'id','nombre', 'usuario', 'password'
    ];


}
