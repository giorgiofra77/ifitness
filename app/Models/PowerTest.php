<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PowerTest extends Model
{
    protected $fillable = [
        'customer_id',
        'date_test',
        'threshold_watt',
        'max_watt',
        'weight',
        'note_test',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class)->withTrashed();
    }
}
