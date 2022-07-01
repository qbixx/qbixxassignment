<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use App\Enums\LocaleEnum;
use Domain\Items\Enums\ItemType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Validator;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items' => ['required', 'array', 'size:3'],
            'items.*.id' => ['integer', 'nullable'],
            'items.*.client_id' => ['required', 'integer'],
            'items.*.type' => ['required', new Enum(ItemType::class)],
            'items.*.title' => ['array:en,nl,fr'],
            'items.*.title.*' => ['required', 'string', 'min:4', 'max:30'],
            'items.*.paragraph' => ['array:en,nl,fr'],
            'items.*.paragraph.*' => ['required', 'string', 'min:40', 'max:300'],
        ];
    }

    public function attributes()
    {
        return [
            'items.*.id' => 'ID',
            'items.*.client_id' => 'client ID',
            'items.*.type' => 'type',
            'items.*.title.*' => 'title',
            'items.*.paragraph.*' => 'paragraph',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function (Validator $validator): void {
            collect(LocaleEnum::cases())->each(function (LocaleEnum $locale) use ($validator): void {
                $keys = [
                    'items.*.title.'.$locale->value,
                    'items.*.paragraph.'.$locale->value,
                ];

                $hasKeyErrors = collect($keys)->filter(
                    fn ($key) => $validator->errors()->has($key)
                )->isNotEmpty();

                if ($hasKeyErrors) {
                    $validator->errors()->add(
                        $locale->value,
                        'The language '.$locale->label().' has errors.'
                    );
                }
            });
        });
    }
}
