<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'logo',
        'nib',
        'npwp',
        'address',
        'pic',
        'pic_position',
        'pic_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booths()
    {
        return $this->hasMany(Booth::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}