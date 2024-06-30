<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'birth_date',
        'country',
        'city',
        'sex',
        'email',
        'password',
        'cv_path',
        'photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
