<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'booth_id',
        'company_id',
        'user_id',
        'status',
        'approved_by',
        'approved_at',
        'amount',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'amount' => 'integer',
    ];

    public function booth()
    {
        return $this->belongsTo(Booth::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}