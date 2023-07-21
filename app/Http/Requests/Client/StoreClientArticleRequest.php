<?php

namespace App\Http\Requests\Client;

use App\Enums\Client\ClientArticleTypesEnum;
use App\Enums\LanguagesEnum;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreClientArticleRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'client_id' => (int) $this->route('client'),
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'client_id' => [
                'required',
                'numeric',
                Rule::exists('clients', 'id'),
            ],
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
