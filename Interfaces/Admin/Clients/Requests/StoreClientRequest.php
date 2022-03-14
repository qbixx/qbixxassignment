<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function rules(): array
    {
        $languages = config('app.available_locales');
        $rules = [];
        foreach ($languages as $language) {
            $rules['items.*.' . $language] = ['required', 'array', 'size:2'];
            $rules['items.*.' . $language . '.title'] = ['required', 'string', 'min:4', 'max:30'];
            $rules['items.*.' . $language . '.paragraph'] = ['required', 'string', 'min:10'];
        }
        return array_merge([
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'items' => ['required', 'array', 'size:3'],
            'items.*' => ['required', 'array', 'size:4'],
            'items.*.type' => ['required', 'numeric'],
        ], $rules);
    }

    public function messages(): array
    {
        $languages = config('app.available_locales');
        $messages = [];
        foreach ($languages as $language) {
            $messages['items.*.' . $language . '.title.required'] = 'The title is required';
            $messages['items.*.' . $language . '.title.min'] = 'The title must be at least :min characters';
            $messages['items.*.' . $language . '.title.max'] = 'The title can be maximum :max characters';
            $messages['items.*.' . $language . '.paragraph.required'] = 'The paragraph is required';
            $messages['items.*.' . $language . '.paragraph.min'] = 'The paragraph must be at least :min characters';
            $messages['items.*.type.required'] = 'The type is required';
        }
        return $messages;
    }
}
