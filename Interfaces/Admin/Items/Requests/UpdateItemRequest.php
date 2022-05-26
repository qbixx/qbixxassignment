<?php

namespace Interfaces\Admin\Items\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    protected $errorBag = 'updateItem';

    public function rules(): array
    {
        return [
            'title.*' => ['required', 'string', 'max:255'],
            'paragraph.*' => ['required', 'string'],
            'type' => ['required', 'in:Wisdom,Philosophy,Design'],
        ];
    }

    public function messages()
    {
        return [
            'title.en.required' => 'The English title field is required.',
            'title.fr.required' => 'The French title field is required.',
            'title.nl.required' => 'The Dutch title field is required.',
            'title.*.string' => 'The title field must be a string.',
            'title.*.max' => 'The title field may not be greater than 255 characters.',
            'paragraph.en.required' => 'The English paragraph field is required.',
            'paragraph.fr.required' => 'The French paragraph field is required.',
            'paragraph.nl.required' => 'The Dutch paragraph field is required.',
            'paragraph.*.string' => 'The paragraph field must be a string.',
            'type.required' => 'The type field is required.',
            'type.in' => 'The type field must be one of: Wisdom, Philosophy, Design.',
        ];
    }
}
