<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Dermatologist extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    // Relationships
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
