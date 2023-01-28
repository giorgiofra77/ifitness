<?php

namespace App\Http\Livewire\Subscription;

use App\Models\SubscriptionCustomer;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Update extends Component
{
    public $price;

    public $subscription_id;

    public $customer_id;

    public $date_start;

    public $date_end;

    public $visible;

    public $subscriptionCustomer;

    protected $rules = [
        'customer_id' => 'required',
        'subscription_id' => 'required',
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'price' => 'required|numeric',
    ];

    public function mount($subscriptionCustomer)
    {
        $subscription = Subscriptions::findOrFail($subscriptionCustomer->subscription_id);

        $this->customer_id = $subscriptionCustomer->customer_id;
        $this->subscription_id = $subscriptionCustomer->subscription_id;
        $this->subscriptionCustomer = $subscriptionCustomer;
        $this->price = $subscription->price;
        $this->date_start = $subscriptionCustomer->date_end;
        $this->date_end = Carbon::createFromDate($subscriptionCustomer->date_end)->addMonth($subscriptionCustomer->months);
        $this->visible = 'visible';
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $subscriptions = Subscriptions::all();

        return view('livewire.subscription.update', [
            'subscriptions' => $subscriptions,
            'subscriptionCustomer' => $this->subscriptionCustomer,
        ]);
    }

    public function getPrice()
    {
        $subscription = Subscriptions::findOrFail($this->subscription_id);
        $this->price = $subscription->price;
        $this->date_end = Carbon::createFromDate($this->date_start)->addMonth($subscription->months);
        $this->visible = 'visible';
    }

    public function dataChange()
    {
        $subscription = Subscriptions::findOrFail($this->subscription_id);
        $this->date_end = Carbon::createFromDate($this->date_start)->addMonth($subscription->months);
        $this->visible = 'visible';
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->subscriptionCustomer->is_expired = true;
            $this->subscriptionCustomer->save();
        }catch (Exception $exception)
        {
            return ($exception);
        }



        $subscriptionCustomer = SubscriptionCustomer::create([
            'customer_id' => $this->customer_id,
            'subscription_id' => $this->subscription_id,
            'price' => $this->price,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);
        $subscription = Subscriptions::findOrFail($this->subscription_id);
        $subscriptionCustomer->months = $subscription->months;
        $subscriptionCustomer->save();

        return to_route('customers.show', $this->customer_id)
            ->with('status', 'Abbonamento rinnovato')
            ->with('alert_type', 'success');
    }
}
