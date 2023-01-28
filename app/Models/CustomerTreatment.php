<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CustomerTreatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the Customers.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    /**
     * Get the Workout.
     */
    public function treatment()
    {
        return $this->belongsTo(Workout::class)->withTrashed();
    }

    // Somma trattamenti del giorno
    public function get_day_sum()
    {
        return DB::table('customer_treatments')
                ->whereDate('created_at', date('Y-m-d'))
                ->whereNull('deleted_at')
                ->sum('treatment_price');
    }

    // Somma trattamenti del mese
    public function get_month_sum()
    {
        return DB::table('customer_treatments')
                ->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->whereNull('deleted_at')
                ->sum('treatment_price');
    }

    // Somma trattamenti del mese
    public function get_year_sum()
    {
        return DB::table('customer_treatments')
                ->whereYear('created_at', date('Y'))
                ->whereNull('deleted_at')
                ->sum('treatment_price');
    }

    // Somma trattamenti per periodo
    public function get_date_sum($from_date, $to_date)
    {
        return DB::table('customer_treatments')
                ->whereDate('created_at', '>= ', $from_date)
                ->whereDate('created_at', '<= ', $to_date)
                ->whereNull('deleted_at')
                ->sum('treatment_price');
    }

    public function get_treatments_group()
    {
        return $this->groupBy('treatment_id')
        ->selectRaw('count(*) as total, treatment_id')
        ->orderByDesc('total')
        ->get();
    }

    public function get_treatments_group_day()
    {
        return $this->groupBy('treatment_id')
        ->selectRaw('count(*) as total, treatment_id')
        ->whereDay('created_at', date('d'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->orderByDesc('total')
        ->get();
    }

    public function get_treatments_group_month()
    {
        return $this->groupBy('treatment_id')
        ->selectRaw('count(*) as total, treatment_id')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->orderByDesc('total')
        ->get();
    }

    public function get_treatments_group_date($from_date, $to_date)
    {
        return $this->groupBy('treatment_id')
        ->selectRaw('count(*) as total, treatment_id')
        ->whereDate('created_at', '>= ', $from_date)
        ->whereDate('created_at', '<= ', $to_date)
        ->orderByDesc('total')
        ->get();
    }
}
