<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerZone extends Model
{
    protected $fillable = [
        'customer_id', 'power_max', 'power_zone_1_min', 'power_zone_1_max',
        'power_zone_2_min', 'power_zone_2_max', 'power_zone_3_min', 'power_zone_3_max',
        'power_zone_4_min', 'power_zone_4_max', 'power_zone_5_min', 'power_zone_5_max',
        'power_zone_6_min', 'power_zone_6_max', 'power_zone_7_min', 'power_zone_7_max',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
