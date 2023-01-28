<?php

namespace App\Http\Livewire\Subscription;

use App\Models\SubscriptionCustomer;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Add extends Component
{
    public $price;

    public $subscription_id;

    public $customer_id;

    public $months;

    public $date_start;

    public $date_end;

    public $visible;

    protected $rules = [
        'customer_id' => 'required',
        'subscription_id' => 'required',
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'price' => 'required|numeric',
    ];

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
        $this->date_start = Carbon::today()->format('Y-m-d');
        $this->visible = 'invisible';
    }

    public function render()
    {
        $subscriptions = Subscriptions::all();

        return view('livewire.subscription.add', [
            'subscriptions' => $subscriptions,
            'customer_id' => $this->customer_id,
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
            ->with('status', 'Abbonamento assegnato')
            ->with('alert_type', 'success');
    }
}
