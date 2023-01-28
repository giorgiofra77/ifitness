<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeartZone extends Model
{
    protected $fillable = [
        'customer_id', 'heart_max', 'heart_zone_1_min', 'heart_zone_1_max',
        'heart_zone_2_min', 'heart_zone_2_max', 'heart_zone_3_min', 'heart_zone_3_max',
        'heart_zone_4_min', 'heart_zone_4_max', 'heart_zone_5_min', 'heart_zone_5_max',
        'heart_zone_6_min', 'heart_zone_6_max', 'heart_zone_7_min', 'heart_zone_7_max',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
