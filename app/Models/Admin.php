<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'decrypt_password',
        'image'
    ];
}
