<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'file',
        'logo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk mendapatkan URL file
    public function getFileUrlAttribute()
    {
        if ($this->file) {
            return asset('storage/scholarship/files/' . $this->file);
        }
        return null;
    }

    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/scholarship/logos/' . $this->logo);
        }
        return asset('assets/icons/aceed.png');
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%");
        });
    }
}