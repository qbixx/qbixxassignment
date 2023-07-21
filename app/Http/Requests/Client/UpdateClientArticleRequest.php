<?php

declare(strict_types=1);

namespace App\Http\Requests\Client;

use App\Enums\Client\ClientArticleTypesEnum;
use App\Enums\LanguagesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateClientArticleRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'array'],
            'paragraph' => ['required', 'array'],
            'type' => ['required', 'array'],
        ];

        foreach (LanguagesEnum::cases() as $languagesEnum) {
            $rules["title.{$languagesEnum->value}"] = ['required', 'string', 'min:4', 'max:255'];
            $rules["paragraph.{$languagesEnum->value}"] = ['required', 'string', 'min:1'];
            $rules["type.{$languagesEnum->value}"] = ['required', new Enum(ClientArticleTypesEnum::class)];
        }

        return $rules;
    }
}
