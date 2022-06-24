<?php

declare(strict_types=1);

namespace App\Providers;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        Factory::guessFactoryNamesUsing(static function (string $modelName): string {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });

        Eloquent::unguard();
    }
}
