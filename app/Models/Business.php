<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'logo',
        'type',
        'description',
        'proposal',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk mendapatkan URL logo
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/business/logos/' . $this->logo);
        }
        return asset('assets/icons/aceed.png');
    }

    // Accessor untuk mendapatkan URL proposal
    public function getProposalUrlAttribute()
    {
        if ($this->proposal) {
            return asset('storage/business/proposals/' . $this->proposal);
        }
        return null;
    }

    /**
     * Relasi dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk filter berdasarkan tipe
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%")
              ->orWhere('type', 'like', "%{$term}%");
        });
    }
}