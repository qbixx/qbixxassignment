<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Domain\Clients\Enums\ItemType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items' => ['required', 'array', 'size:3'],
            'items.*' => ['required', 'array', 'size:3', 'required_array_keys:title,paragraph,type'],
            'items.*.title.*' => ['string', 'min:4', 'max:30'],
            'items.*.paragraph.*' => ['string', 'min:10', 'max:200'],
            'items.*.type' => ['string', new Enum(ItemType::class)],
        ];
    }
}
