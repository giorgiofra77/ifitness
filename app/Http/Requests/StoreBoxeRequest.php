<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoxeRequest extends FormRequest
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
            'box_name' => ['required', 'string', 'max:255'],
            'box_price' => ['required', 'numeric'],
            'box_note' => ['string', 'nullable'],
            'customer_id' => ['required'],
        ];
    }
}
