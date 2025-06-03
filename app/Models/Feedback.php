<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'volunteer_id',
        'opportunity_id',
        'rating',
        'comments',
    ];

    // Feedback belongs to Volunteer
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    // Feedback belongs to Opportunity
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
