<?php namespace App\Helpers;

use Domain\Languages\Models\Language;
use Illuminate\Support\Facades\Lang;
use Locale;

class LanguageHelper
{
    public static function getCurrentLanguage()
    {
        $languageName = Locale::getDisplayLanguage(Lang::locale());
        return Language::where('name', $languageName)->first();
    }


}
