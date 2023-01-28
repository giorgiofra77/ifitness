<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50', 'unique:articles'],
            'barcode' => ['string', 'max:50', 'nullable', 'unique:articles'],
            'code_desc' => ['required', 'string', 'max:255', 'nullable'],
            'vendor_id' => ['required'],
            'price_cost' => ['numeric', 'nullable'],
            'price_sell' => ['numeric', 'nullable'],
            'under_stock' => ['numeric', 'nullable'],
        ];
    }
}
