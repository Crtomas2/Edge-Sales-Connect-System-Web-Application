<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempData extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_number',
        'barcode_number',
        'description',
        'item_division',
        'size_code',
        'color_code',
        'variant_code',
        'unit_measure',
        'barcode_class',
    ];
}
