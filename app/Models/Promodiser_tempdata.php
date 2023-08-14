<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promodiser_tempdata extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'mobile_number',
        'promodiser_status'
    ];
}
