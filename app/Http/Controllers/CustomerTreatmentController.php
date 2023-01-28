<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerTreatmentRequest;
use App\Models\CustomerTreatment;
use App\Models\Workout;
use Illuminate\Http\Request;

class CustomerTreatmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'treatment_id' => ['required'],
            'customer_id' => ['required'],
            'note' => ['string', 'max:255', 'nullable'],
            'products' => ['string', 'max:255', 'nullable'],
            'treatment_price' => ['numeric', 'nullable'],
            'acconto' => ['numeric', 'nullable'],

        ]);

        if ($customerTreatment = CustomerTreatment::create($attributes)) {
            if ($request->treatment_price == 0 || $request->treatment_price == null) {
                $price_standard = Workout::findOrfail($request->treatment_id)->price;
                if ($request->gratis) {
                    $price_standard = 0;
                    $customerTreatment->treatment_price = $price_standard;
                    $customerTreatment->save();
                } else {
                    $customerTreatment->treatment_price = $price_standard;
                    $customerTreatment->save();
                }
            } else {
                $customerTreatment->treatment_price = $request->treatment_price;
                $customerTreatment->save();
            }

            return redirect()->action(
                [CustomerController::class, 'show'], ['customer' => $request->customer_id]
            )->with('status', 'Trattamento registrato');
        } else {
            dd('errore in inserimento');
        }
    }

    public function show(CustomerTreatment $customerTreatment)
    {
        return view('customerstreatments.show', ['customerTreatment' => $customerTreatment]);
    }

    public function edit(CustomerTreatment $customerTreatment)
    {
        return view('customerstreatments.edit', [
            'customerTreatment' => $customerTreatment,
            'tests' => Workout::all(),
        ]);
    }

    public function update(UpdateCustomerTreatmentRequest $request, CustomerTreatment $customerTreatment)
    {
        $validated = $request->validated();
        $customerTreatment->update($validated);

        return $this->show($customerTreatment);
    }

    public function destroy(CustomerTreatment $customerTreatment)
    {
        if ($customerTreatment->delete()) {
            return redirect()->route('customers.show', $customerTreatment->customer_id)
                ->with('status', 'Trattamento cliente eliminato correttamente');
        }
    }
}
