<?php

namespace App\Models;

use App\Models\Scopes\AccountScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
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

    /**
     * Get all of the customerTreatment for the Workout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class)->withTrashed();
    }

    public function customerTreatments(): HasMany
    {
        return $this->hasMany(CustomerTreatment::class)->withTrashed();
    }

    public function boxeTreatments(): HasMany
    {
        return $this->belongsToMany(BoxeTreatment::class)->withTrashed();
    }
}
