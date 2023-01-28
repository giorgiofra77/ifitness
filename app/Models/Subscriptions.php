<?php

namespace App\Models;

use App\Models\Scopes\AccountScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Subscriptions extends Model
{
    protected $fillable = ['account_id','code', 'descr', 'price', 'months'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new AccountScope());
    }

    /**
     * The users that belong to the role.
     */
    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'subscription_customers',
            'subscription_id', 'customer_id')
            ->withPivot('id', 'is_expired', 'date_start', 'date_end', 'months', 'price', 'is_under');
    }


    /**
     * @param $query
     * @param $id
     * @return void
     */
    public function scopeSubDescr($query, $id)
    {
        return $query->findOrFail($id);
    }
}
