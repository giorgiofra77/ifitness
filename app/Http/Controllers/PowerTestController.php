<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePowerTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Customer;
use App\Models\PowerTest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class PowerTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($customer)
    {
        $tests = PowerTest::where('customer_id', $customer)->orderByDesc('id')->get();
        $customer = Customer::findOrFail($customer);

        return View::make('customersTest.index',
            [
                'tests' => $tests,
                'customer' => $customer,
            ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePowerTestRequest $request
     * @return RedirectResponse
     */
    public function store(StorePowerTestRequest $request)
    {
        $validated = $request->validated();
        $test = PowerTest::create($validated);

        return to_route('test.show', $test->id)
            ->with('status', 'Nuovo test inserito con successo!')
            ->with('alert_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PowerTest  $test
     * @return RedirectResponse
     */
    public function show(PowerTest $test)
    {
        return View::make('customersTest.show', ['test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PowerTest  $test
     * @return Response
     */
    public function edit(PowerTest $test)
    {
        return View::make('customersTest.edit', ['test' => $test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\PowerTest  $test
     * @return Response
     */
    public function update(UpdateTestRequest $request, PowerTest $test): RedirectResponse
    {
        $validated = $request->validated();
        $test->update($validated);

        return to_route('test.show', $test->id)
            ->with('status', 'PowerTest aggiornato correttamente')
            ->with('alert_type', 'success');
    }

    public function powerzone(Customer $customer)
    {
        return View::make('customersTest.powerzone', ['customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PowerTest  $test
     * @return RedirectResponse
     */
    public function destroy(PowerTest $test)
    {
        $test->delete();

        return to_route('customers.show', $test->customer_id)
            ->with('status', 'PowerTest eliminato correttamente')
            ->with('alert_type', 'danger');
    }
}
