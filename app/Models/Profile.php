<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'date_of_birth',
        'place_of_birth',
        'address',
        'role',
        'avatar'
    ];
}
