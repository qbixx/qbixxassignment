<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function rules(): array
    {

        $rules = [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items.*.type_id' => ['required', 'exists:types,id'],
        ];

        // foreach (config('translatable.locales') as $locale) {
        //     $rules[$locale . '.title'] = ['required', 'string'];
        //     $rules[$locale . '.paragraph'] = ['required', 'string'];
        // }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            'items.*.type_id.required' => 'Type is required',
            'items.*.type_id.exists' => 'Invalid type selected',
        ];

        foreach (config('translatable.locales') as $locale) {
            $messages['items.*.' . $locale . '.title.required'] = 'A title is required';
            $messages['items.*.' . $locale . '.title.string'] = 'The title must be a string';
            $messages['items.*.' . $locale . '.paragraph.required'] = 'A paragraph is required';
            $messages['items.*.' . $locale . '.paragraph.string'] = 'The paragraph must be a string';
        }

        return $messages;
    }
}
