<?php

namespace App\Models;

use App\Models\Scopes\AccountScope;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCustomer extends Model
{
    protected $fillable = ['customer_id', 'subscription_id', 'price', 'date_start', 'date_end'];

    public static function isValidSubscription(): void
    {
        static::where('is_expired', 0)
            ->where('date_end', '<', today())
            ->update(['is_expired' => 1]);
    }
    public static function isUnderSubscription(string $days = 'P30D'): void
    {
        static::where('is_expired', 0)
            ->where('date_end', '<=', today()->add($days))
            ->update(['is_under' => 1]);
    }

    public static function getCustomerActive($customer_id)
    {
        return static::where('customer_id', $customer_id)
            ->where('is_expired', false)->get();
    }

    public static function getYearSum($customer_id)
    {
        return static::where('customer_id', $customer_id)->whereYear('date_start', date('Y'))->sum('price');
    }

    public static function getAllSum($customer_id)
    {
        return static::where('customer_id', $customer_id)->sum('price');
    }
}
