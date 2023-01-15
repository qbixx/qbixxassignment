<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use App\Enums\AppLanguage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SetLocaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'language' => ['required', 'string', new Enum(AppLanguage::class)],
        ];
    }
}
