<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSApi extends Model
{
    use HasFactory;
    protected $fillable = [
      'firstname',
      'lastname',
      'barcode_number',
      'stock_code',
      'color',
      'size',
      'unit_price',
      // 'running_total',
      // 'remarks_age_gender',
      'total_quantity',
      'brand',
      'outlet',
      'remarks',
      // 'full_name',
      // 'mobile_number',    
    ];

    public function scopeBetweenDates($query, $field_name, $start_date, $end_date)
    {
      return $query->where($field_name, '>=', date($start_date))
        ->where($field_name, '<=', date($end_date));
    }
}
