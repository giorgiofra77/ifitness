<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'account_id' => ['required', 'exists:accounts,id'],
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'address' => ['string', 'max:255', 'nullable'],
            'city' => ['string', 'max:50', 'nullable'],
            'zip' => ['string', 'max:15', 'nullable'],
            'email' => ['email', 'max:100', 'unique:customers', 'nullable'],
            'cell' => ['string', 'max:50', 'nullable'],
            'note' => ['string', 'nullable'],
            'state' => ['string', 'max:50', 'nullable'],
            'birthday' => ['date', 'max:50', 'nullable'],
            'card_number' => ['string', 'max:50', 'nullable'],
            'sport' => ['string', 'max:50', 'nullable'],
        ];
    }
}
