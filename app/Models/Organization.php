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
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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

    // Optional: feedbacks through opportunities if needed
    public function feedbacks()
    {
        return $this->hasManyThrough(Feedback::class, Opportunity::class);
    }
}
