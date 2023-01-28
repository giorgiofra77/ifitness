<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWorkoutRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50', Rule::unique('tests')->ignore($this->treatment->id)],
            'desc' => ['required', 'string', 'max:255'],
            'durata' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
        ];
    }
}
