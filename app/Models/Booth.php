<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'size',
        'facility',
        'price',
        'picture',
        'status',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}