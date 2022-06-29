<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\LocaleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(Request $request): array
    {
        $locale = App::getLocale();

        $availableLocales = collect(LocaleEnum::cases())->map(function (LocaleEnum $locale) {
            return [
                'value' => $locale->value,
                'text' => Lang::get('qbixxassignment.language', [], $locale->value),
                'label' => $locale->label(),
            ];
        })->all();

        return array_merge(
            parent::share($request),
            compact(['locale', 'availableLocales'])
        );
    }
}
