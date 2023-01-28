<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'account_id' => 1,
            'name' => 'Giorgio',
            'lastname' => 'Franchini',
            'address' => 'Via Beato Lodovico Pavoni, 4',
            'city' => "Provaglio d'Iseo",
            'email' => 'giorgio.franchini77@gmail.com',
        ]);

        Customer::factory(100)->create();
    }
}
