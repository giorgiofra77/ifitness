<?php

namespace Database\Factories;

use App\Models\Subscriptions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscriptions>
 */
class SubscriptionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => 'ANN2ALL',
            'descr' => 'Abbonamento 12 mesi 2 allenamenti',
            'months' => 12,
            'price' => 430,
        ];
    }
}
