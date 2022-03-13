<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function rules(): array
  {
    switch (request()->method) {
      case 'PUT':
      case 'POST':
        return [
            'name' => 'required|string|min:4|max:30',
            'items.*.type_en' => 'required',
            'items.*.type_nl' => 'required',
            'items.*.type_fr' => 'required',
            'items.*.title_en' => 'required',
            'items.*.title_nl' => 'required',
            'items.*.title_fr' => 'required',
            'items.*.description_en' => 'required',
            'items.*.description_nl' => 'required',
            'items.*.description_fr' => 'required'
        ];
      default:
        return [];
    }
  }

  public function messages()
  {
    return [
        'items.*.type_en.required' => 'Type is required',
        'items.*.type_nl.required' => 'Type is required',
        'items.*.type_fr.required' => 'Type is required',
        'items.*.title_en.required' => 'Title is required',
        'items.*.title_nl.required' => 'Title is required',
        'items.*.title_fr.required' => 'Title is required',
        'items.*.description_en.required' => 'Description is required',
        'items.*.description_nl.required' => 'Description is required',
        'items.*.description_fr.required' => 'Description is required'
    ];
  }
}
