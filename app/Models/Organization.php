<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',  // add password here if you handle login
    ];

    protected $hidden = [
        'password',
        'remember_token',  // if you want to use "remember me" functionality
    ];

    // Relations
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function registrations()
    {
        return $this->hasManyThrough(Registration::class, Opportunity::class);
    }
}
