<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Customer;
use App\Models\SubscriptionCustomer;
use Livewire\Component;

class Index extends Component
{
    public $customer;

    public $idDelete;

    public function render()
    {

        return view('livewire.subscription.index', [
            'subscriptions' => $this->customer->allSubscriptions,
        ]);
    }

    public function deleteId($id)
    {
        $this->idDelete = $id;
    }

    public function destroy()
    {
        SubscriptionCustomer::destroy($this->idDelete);

        return to_route('customers.show', $this->customer_id)
            ->with('status', 'Iscrizione cancellata con successo')
            ->with('alert_type', 'success');
    }
}
