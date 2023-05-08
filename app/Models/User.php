<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'api_key'
    ];
    protected $hidden = [
        'password',
        'api_key'
    ];

    // public $timestamps = false;
}
