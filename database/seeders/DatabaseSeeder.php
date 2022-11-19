<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ClientSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(TypeSeeder::class);
    }
}
