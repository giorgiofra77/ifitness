<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
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
            'ragsociale' => ['required', 'string', 'max:255'],
            'piva' => ['string', 'unique:vendors', 'max:25', 'nullable'],
            'rappresentante' => ['string', 'max:255', 'nullable'],
            'phone' => ['string', 'max:255', 'nullable'],
            'city' => ['string', 'max:50', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'zip' => ['string', 'max:15', 'nullable'],
            'cell' => ['string', 'max:50', 'nullable'],
            'fax' => ['string', 'max:50', 'nullable'],
            'prodotti_trattati' => ['string', 'max:255', 'nullable'],
        ];
    }
}
