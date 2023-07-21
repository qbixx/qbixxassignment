<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyClientRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('client'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => ['required', Rule::exists('clients', 'id')],
        ];
    }
}
