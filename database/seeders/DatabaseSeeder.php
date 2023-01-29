<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        //$this->call(CustomerSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(AccountSeeder::class);
    }
}
