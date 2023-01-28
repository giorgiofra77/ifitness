<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50', Rule::unique('articles')->ignore($this->article->id)],
            'barcode' => ['string', 'max:50', 'nullable', Rule::unique('articles')->ignore($this->article->id)],
            'vendor_id' => ['required'],
            'code_desc' => ['required', 'string', 'max:255', 'nullable'],
            'price_cost' => ['numeric', 'nullable'],
            'price_sell' => ['numeric', 'nullable'],
            'under_stock' => ['numeric', 'nullable'],
        ];
    }
}
