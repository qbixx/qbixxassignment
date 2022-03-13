<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Schema::defaultStringLength(191);
    Factory::guessFactoryNamesUsing(static function (string $modelName): string {
      return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
    });
  }
}
