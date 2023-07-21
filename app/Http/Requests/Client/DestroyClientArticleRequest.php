<?php

namespace App\Http\Requests\Client;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyClientArticleRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'client_id' => (int) $this->route('client'),
            'article_id' => (int) $this->route('article'),
        ]);
    }

    public function rules(): array
    {
        return [
            'article_id' => [
                'required',
                Rule::exists('articles', 'id')->where(function (Builder $query) {
                    $query->where('client_id', $this->input('client_id'));
                })
            ],
        ];
    }
}
