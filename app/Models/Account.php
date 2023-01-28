<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Account extends Model
{

    protected $fillable = [
        'ragsociale', 'address', 'city', 'zip', 'state', 'cell', 'email', 'phone', 'piva', 'cfisc'
    ];

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function fullAddress(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) =>
                $attributes['address'].
                ' '.
                $attributes['zip'].
                ' '.
                $attributes['city'],
            set: function ($value) {
                [$first, $second, $third] = explode(' ', $value);

                return [
                    'address' => $first,
                    'zip' => $second,
                    'city' => $third
                ];
            }
        );
    }
}
