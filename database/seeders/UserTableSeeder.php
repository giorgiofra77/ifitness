<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::create([
                'account_id' => 1,
                'name' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@ifitness.it',
                'username' => 'admin',
                'is_admin' => 1,
                'password' => '$2y$10$kpe4oaYiPDZjhcJQo8ebNuDwon15vVHbTVJ0zbLU3iqm8f5g9sfK.',
            ]);


        } catch (\Exception $exception)
        {
            $error = $exception;
        }
    }
}
