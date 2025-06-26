<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'participant_category',
        'identity_number',
        'domicile',
        'institution_name',
        'purpose',
        'where_did_you_hear',
        'wish_for_event',
    ];

    protected $casts = [
        'interested_next_event' => 'boolean',
    ];
}