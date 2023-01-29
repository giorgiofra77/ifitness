<?php

namespace App\View\Components\Customer;

use Illuminate\View\Component;

class AddTretamentCustomer extends Component
{
    public $customer;

    public $treatments;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($customer, $treatments)
    {
        $this->customer = $customer;
        $this->treatments = $treatments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customer.add-tretament-customer');
    }
}
