<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\AccountScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new AccountScope());
    }

    //# Calcolo del compleanno
    public static function isBirthday():Collection
    {
        return static::query()
            ->whereMonth('birthday', date('m'))
            ->whereDay('birthday', date('d'))->get();
    }

    public function scopeSearchCustomer($query, $search)
    {
        return $query
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('lastname', 'like', '%'.$search.'%')
            ->orderBy('name')
            ->get();
    }

    /**
     * Get all the customerTreatment for the Workout
     */
    public function tests(): HasMany
    {
        return $this->hasMany(PowerTest::class);
    }

    public function subscriptions(): belongsToMany
    {
        return $this->belongsToMany(
            Subscriptions::class,
            'subscription_customers',
            'customer_id',
            'subscription_id'
        )
            ->withPivot('id', 'is_expired', 'date_start', 'date_end', 'months', 'price','is_under')
            ->wherePivot('is_expired', false)
            ->orderByPivot('date_end', 'desc');
    }

    /**
     * @return BelongsToMany
     */
    public function allSubscriptions(): belongsToMany
    {
        return $this->belongsToMany(
            Subscriptions::class,
            'subscription_customers',
            'customer_id',
            'subscription_id'
        )
            ->withPivot('id', 'is_expired', 'date_start', 'date_end', 'months', 'price','is_under')
            ->orderByPivot('date_end', 'desc');
    }
    //subscriptions under 30 days
    public function subscriptionsUnder(): belongsToMany
    {
        return $this->belongsToMany(
            Subscriptions::class,
            'subscription_customers',
            'customer_id',
            'subscription_id'
        )
            ->withPivot('id', 'is_expired', 'date_start', 'date_end', 'months', 'price','is_under')
            ->wherePivot('is_expired', false)
            ->wherePivot('is_under', true)
            ->orderByPivot('date_end', 'desc');
    }

    public function powerzone(): hasOne
    {
        return $this->hasOne(PowerZone::class);
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $attributes['name'].
                ' '.
                $attributes['lastname'],
            set: function ($value) {
                [$first, $last] = explode(' ', $value);

                return [
                    'name' => $first,
                    'lastname' => $last,
                ];
            }
        );
    }

}
