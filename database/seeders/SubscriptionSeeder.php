<?php

namespace Database\Seeders;

use App\Models\Subscriptions;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = collect([
            [
                'account_id' => 1,
                'code' => 'tri2all',
                'descr' => 'Pacchetto trimestrale 2 allenamenti',
                'price' => 230,
                'months' => 3,
            ],
            [
                'account_id' => 1,
                'code' => 'sem2all',
                'descr' => 'Pacchetto semestrale 2 allenamenti',
                'price' => 430,
                'months' => 6,
            ],
            [
                'account_id' => 1,
                'code' => 'ann2all',
                'descr' => 'Pacchetto annuale 2 allenamenti',
                'price' => 820,
                'months' => 12,
            ],
            [
                'account_id' => 1,
                'code' => 'tri3all',
                'descr' => 'Pacchetto trimestrale 2 allenamenti',
                'price' => 320,
                'months' => 3,
            ],
            [
                'account_id' => 1,
                'code' => 'sem3all',
                'descr' => 'Pacchetto semestrale 3 allenamenti',
                'price' => 560,
                'months' => 6,
            ],
            [
                'account_id' => 1,
                'code' => 'ann3all',
                'descr' => 'Pacchetto annuale 3 allenamenti',
                'price' => 1050,
                'months' => 12,
            ],
        ]);

        foreach ($subscriptions as $subscription) {
            Subscriptions::create($subscription);
        }
    }
}
