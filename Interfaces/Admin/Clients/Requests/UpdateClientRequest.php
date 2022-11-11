<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'itemsList.*.type_id' => ['required','integer'],
            'itemsList.*.title.*' => ['required','string'],
            'itemsList.*.paragraph.*' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'itemsList.*.title.*.required' => __('validation.required', ['attribute' => 'title']),
            'itemsList.*.paragraph.*.required' => __('validation.required', ['attribute' => 'paragraph']),
            'itemsList.*.title.*.string' => __('validation.string', ['attribute' => 'title']),
            'itemsList.*.paragraph.*.string' => __('validation.string', ['attribute' => 'paragraph'])
        ];
    }
}
