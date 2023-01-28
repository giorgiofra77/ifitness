<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreSubscriptionsRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'code' => Str::remove(' ', $this->code),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account_id' => ['required', 'exists:accounts,id'],
            'code' => ['required', 'string', 'max:25', 'unique:subscriptions'],
            'descr' => ['required', 'string', 'max:255'],
            'months' => ['required', 'integer', 'max:999'],
            'price' => ['required', 'integer', 'max:9999'],
        ];
    }
}
