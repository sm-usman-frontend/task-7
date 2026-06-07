<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
        'gender',
        'dob',
    ];

    /**
     * The attributes that should be hidden for arrays / JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}   