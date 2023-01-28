<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\CustomerTreatment;
use App\Models\SubscriptionCustomer;
use App\Models\Workout;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index(Request $request): Factory|\Illuminate\Contracts\View\View|View|Application
    {
        if ($request->has('all')) {
            $customers = Customer::simplePaginate(8);
            return view('customers.index', compact('customers'));
        } else {
            return view('customers.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCustomerRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        $customer = Customer::create($validated);

        return to_route('customers.show', $customer->id)
            ->with('status', 'Atleta aggiunto correttamente')
            ->with('alert_type', 'success');
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function show(Customer $customer): Factory|\Illuminate\Contracts\View\View|View|Application
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer  $customer
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function edit(Customer $customer): Factory|\Illuminate\Contracts\View\View|View|Application
    {
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest  $request
     * @param  Customer  $customer
     * @return RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validated();
        $customer->update($validated);

        return to_route('customers.show', $customer->id)
            ->with('status', 'Atleta modificato correttamente')
            ->with('alert_type', 'success');
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  Request  $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function find(Request $request)
    {
        $request->validate(['find' => 'required|min:3']);
        //Local Scope query
        return view('customers.index', [
            'customers' => Customer::searchcustomer($request->find),
            'nopaginate' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Customer  $customer
     * @return RedirectResponse
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return to_route('customers.index')->with('status', 'Cliente eliminato correttamente');
    }
}
