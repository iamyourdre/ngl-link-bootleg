<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'password', 'api_key',
    ];

    protected $hidden = [
        'password', 'api_key',
    ];

    public static function createWithRandomApiKey(array $attributes = [])
    {
        $attributes['api_key'] = bin2hex(random_bytes(15));
        $attributes['password'] = Hash::make($attributes['password']);
        return self::create($attributes);
    }
}
