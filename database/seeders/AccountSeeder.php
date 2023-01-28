<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        Account::create([
            'ragsociale' => 'S&H PROGRAM TRAINING',
            'address' => 'Via Sandro Pertini, 114',
            'city' => 'Cazzago San Martino',
            'zip' => '25046',
            'state' => 'Brescia',
            'cell' => '340 909 6434',
            'email' => 'shprogramtraining@gmail.com',
            'phone' => '',
            'piva' =>'03934260989',
            'cfisc' => '03934260989',
        ]);
        Account::create([
            'ragsociale' => 'Progetto 6 s.r.l.',
            'address' => 'Via Vergnano, 81',
            'city' => 'Brescia',
            'zip' => '25125',
            'state' => 'Brescia',
            'cell' => '335 7241660',
            'email' => 'info@progetto6.it',
            'phone' => '030 3534431',
            'piva' =>'03259420176',
            'cfisc' => '03259420176',
        ]);
    }
}
