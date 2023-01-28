<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SubscriptionCustomer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SubscriptionCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Customer  $customer
     * @return View
     */
    public function index(Customer $customer)
    {
        return view('customerSubsc.index', [
            'customer' => $customer,
        ]);
    }

    public function getSubscriptionCustomers()
    {
        $customers = Customer::whereHas('subscriptions')
            ->with('subscriptions')
            ->simplePaginate(5);
        return view ('subscriptions.subscriptioncustomer',compact('customers'));

    }

    public function getSubscriptionCustomersUnder()
    {
        $customers = Customer::whereHas('subscriptionsUnder')
            ->with('subscriptionsUnder')
            ->simplePaginate(5);
        return view ('subscriptions.subscriptioncustomer',compact('customers'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($customer_id): View|RedirectResponse
    {
        if (count(SubscriptionCustomer::getCustomerActive($customer_id)) > 0) {
            return to_route('customers.show', $customer_id)
                ->with('status', 'Abbonamento già attivo')
                ->with('alert_type', 'warning');
        }
        $customer = Customer::findOrFail($customer_id);

        return view('customerSubsc.create', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionCustomer  $subscriptionCustomer
     * @return Response
     */
    public function show(SubscriptionCustomer $subscriptionCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionCustomer  $subscriptionCustomer
     * @return Response
     */
    public function edit(SubscriptionCustomer $subscriptionCustomer)
    {
        dd($subscriptionCustomer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubscriptionCustomer  $subscriptionCustomer
     * @return View
     */
    public function update(SubscriptionCustomer $subscriptionCustomer)
    {
        $customer = Customer::findOrFail($subscriptionCustomer->customer_id);

        return view('customerSubsc.update', [
            'customer' => $customer,
            'subscriptionCustomer' => $subscriptionCustomer,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionCustomer  $subscriptionCustomer
     * @return Response
     */
    public function destroy(SubscriptionCustomer $subscriptionCustomer)
    {
        //
    }
}
