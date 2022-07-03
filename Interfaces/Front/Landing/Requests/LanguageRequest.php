<?php

declare(strict_types=1);

namespace Interfaces\Front\Landing\Requests;

use App\Enums\LocaleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class LanguageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'locale' => ['required', new Enum(LocaleEnum::class)],
        ];
    }
}
