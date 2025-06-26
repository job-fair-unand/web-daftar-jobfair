<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'user_id',
        'logo',
        'sponsor_package',
        'mou',
        'wish_for_event',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk mendapatkan URL logo
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/sponsor/logos/' . $this->logo);
        }
        return asset('assets/icons/aceed.png');
    }

    // Accessor untuk mendapatkan URL MOU
    public function getMouUrlAttribute()
    {
        if ($this->mou) {
            return asset('storage/sponsor/mou/' . $this->mou);
        }
        return null;
    }

    // Accessor untuk mendapatkan nama paket yang lebih readable
    public function getPackageNameAttribute()
    {
        $packages = [
            'platinum' => 'Platinum',
            'gold' => 'Gold',
            'silver' => 'Silver',
            'bronze' => 'Bronze'
        ];

        return $packages[$this->sponsor_package] ?? $this->sponsor_package;
    }

    // Scope untuk filter berdasarkan paket
    public function scopeByPackage($query, $package)
    {
        return $query->where('sponsor_package', $package);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('email', 'like', "%{$term}%")
              ->orWhere('sponsor_package', 'like', "%{$term}%")
              ->orWhere('wish_for_event', 'like', "%{$term}%");
        });
    }
}