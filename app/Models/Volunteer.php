<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // For authentication
use Illuminate\Notifications\Notifiable;

class Volunteer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        // add any other volunteer-specific fields
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Volunteer has many registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

        public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
        public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class, 'registrations')
                    ->withPivot('status')
                    ->withTimestamps();
    }




}
