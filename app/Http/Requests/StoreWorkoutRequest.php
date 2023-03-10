<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50', 'unique:tests'],
            'desc' => ['required', 'string', 'max:255'],
            'durata' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'note' => ['nullable', 'string', 'max:255'],

        ];
    }
}
