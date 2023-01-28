<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'address' => ['string', 'max:255', 'nullable'],
            'city' => ['string', 'max:50', 'nullable'],
            'zip' => ['string', 'max:15', 'nullable'],
            'email' => ['email', 'max:100', Rule::unique('customers')->ignore($this->customer->id), 'nullable'],
            'cell' => ['string', 'max:50', 'nullable'],
            'note' => ['string', 'nullable'],
            'state' => ['string', 'max:50', 'nullable'],
            'birthday' => ['date', 'max:50', 'nullable'],
            'card_number' => ['string', 'max:50', 'nullable'],
            'sport' => ['string', 'max:50', 'nullable'],
        ];
    }
}
