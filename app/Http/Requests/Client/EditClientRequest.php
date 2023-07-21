<?php

declare(strict_types=1);

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditClientRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'client' => $this->route('client'),
        ]);
    }

    public function rules(): array
    {
        return [
            'client' => ['required', Rule::exists('clients', 'id')],
        ];
    }
}
