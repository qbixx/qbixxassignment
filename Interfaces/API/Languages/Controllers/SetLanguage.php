<?php
declare(strict_types=1);

namespace Interfaces\API\Languages\Controllers;


class SetLanguage
{
    public function __invoke($languageCode)
    {
        session()->put('locale', $languageCode);
        return response()->json(['message' => 'The language has been changed.']);
    }
}
