<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date_test' => ['date', 'nullable'],
            'threshold_watt' => ['required', 'integer', 'max:9999'],
            'max_watt' => ['required', 'integer', 'max:9999'],
            'weight' => ['required', 'integer', 'max:9999'],
            'note_test' => ['string', 'max:255', 'nullable'],
        ];
    }
}
