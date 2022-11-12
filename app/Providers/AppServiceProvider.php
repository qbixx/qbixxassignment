<?php

declare(strict_types=1);

namespace App\Providers;

use App\Helpers\General;
use App\Helpers\Helpers;
use Domain\Languages\Models\Language;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Factory::guessFactoryNamesUsing(static function (string $modelName): string {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });

        Inertia::share([
            'locale' => function () {
                return app()->getLocale();
            },
            'languages'=>function(){
                return Language::all();
            },
            'language' => function () {
                return General::translations(
                    base_path('lang/'. app()->getLocale() .'.json')
                );
            },
        ]);
        Eloquent::unguard();
    }
}
