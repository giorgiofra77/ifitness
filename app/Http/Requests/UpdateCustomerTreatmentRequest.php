<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerTreatmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'treatment_id' => ['required'],
            'note' => ['string', 'max:255', 'nullable'],
            'products' => ['string', 'max:255', 'nullable'],
            'treatment_price' => ['numeric', 'nullable'],
            'acconto' => ['numeric', 'nullable'],
        ];
    }
}
