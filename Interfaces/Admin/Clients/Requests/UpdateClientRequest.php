<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Domain\ClientItem\Models\ClientItem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        $Wisdom = ClientItem::Wisdom;
        $Philosophy = ClientItem::Philosophy;
        $Design = ClientItem::Design;

        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items' => ['required', 'array', 'min:3', 'max:3'],
            'items.*.id' => ['required',],
            'items.*.type' => ['required', 'string', "in:{$Wisdom},{$Philosophy},{$Design}"],

            'items.*.title.en' => ['required', 'string', 'min:4'],
            'items.*.title.fr' => ['required', 'string', 'min:4'],
            'items.*.title.nl' => ['required', 'string', 'min:4'],

            'items.*.paragraph.en' => ['required', 'string', 'min:4'],
            'items.*.paragraph.fr' => ['required', 'string', 'min:4'],
            'items.*.paragraph.nl' => ['required', 'string', 'min:4'],

        ];
    }

    public function messages(): array
    {

        return [
            'items.*.paragraph.en.required' => 'The paragraph english field is required',
            'items.*.paragraph.fr.required' => 'The paragraph french field is required',
            'items.*.paragraph.nl.required' => 'The paragraph dutch field is required',

            'items.*.title.en.required' => 'The title english field is required',
            'items.*.title.fr.required' => 'The title french field is required',
            'items.*.title.nl.required' => 'The title dutch field is required',
        ];
    }
}
