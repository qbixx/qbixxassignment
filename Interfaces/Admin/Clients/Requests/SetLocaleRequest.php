<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetLocaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'language' => ['required', 'string', 'in:en,nl,fr'],
        ];
    }
}
