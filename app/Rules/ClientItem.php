<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClientItem implements Rule
{
    private string $message = '';

    public function passes($attribute, $value)
    {
        $items = collect($value);

        $items->pluck('title')
            ->flatten()
            ->each(
                function (string $title)
                {
                    $length = strlen($title);

                    if ($length < 4 || $length > 30) {
                        $this->message = 'All titles have to be between 4 and 30 characters long';
                    }
                }
            );

        $items->pluck('paragraph')
            ->flatten()
            ->each(
                function (string $paragraph)
                {
                    $length = strlen($paragraph);

                    if ($length < 10 || $length > 200) {
                        $this->message = 'All paragraphs have to be between 10 and 200 characters long';
                    }
                }
            );

        return $this->message === '';
    }

    public function message()
    {
        return $this->message;
    }
}
