<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellRequest extends FormRequest
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
            'qta' => ['required', 'integer', 'max:99999'],
            'price_sell' => ['required', 'numeric'],
            'article_id' => ['required'],
            'customer_id' => ['required'],
        ];
    }
}
