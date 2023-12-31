<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promodisers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Firstname',
        'Lastname',
        'Mobilenumber',
        'Location_code',
        'promodiser_status'
    ];

    /**
     * Get the related location assignment
     * 
     * 
     */
    public function assignments()
    {
        return $this->hasMany(PromodiserAssignation::class);
    }

    /**
     * Get the latest location assignment
     */
    public function latest_assignment()
    {
        return $this->hasOne(PromodiserAssignation::class)->latest();
    }
}
