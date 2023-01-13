<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use App\Rules\ClientItem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items' => ['required', 'array', new ClientItem],
        ];
    }
}
