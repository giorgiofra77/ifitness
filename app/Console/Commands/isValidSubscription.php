<?php

namespace App\Console\Commands;

use App\Models\SubscriptionCustomer;
use Illuminate\Console\Command;

class isValidSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:isValidSubscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the customer as a valid subscription';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SubscriptionCustomer::isValidSubscription();
        return Command::SUCCESS;
    }
}
