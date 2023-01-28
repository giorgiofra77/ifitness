<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastname(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            'state' => $this->faker->state(),
            'cell' => $this->faker->phoneNumber(),
            'birthday' => $this->faker->date(),
            'sport' => $this->faker->jobTitle(),
            'card_number' => $this->faker->creditCardNumber(),
            'note' => $this->faker->text(),
        ];
    }
}
