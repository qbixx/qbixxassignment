<?php

declare(strict_types=1);

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('client'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => ['required', Rule::exists('clients', 'id')],
            'name' => [
                'required',
                'string',
                'min:4',
                'max:30',
                Rule::unique('clients', 'name')->ignore($this->input('id'))
            ],
        ];
    }
}
