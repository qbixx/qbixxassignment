<?php

namespace Database\Seeders;

use Domain\Clients\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'en' => [
                'name' => 'Wisdom'
            ],
            'nl' => [
                'name' => 'Wijsheid'
            ],
            'fr' => [
                'name' => 'Sagesse'
            ],
        ]);

        Type::create([
            'en' => [
                'name' => 'Philosophy'
            ],
            'nl' => [
                'name' => 'Filosofie'
            ],
            'fr' => [
                'name' => 'Philosophie'
            ],
        ]);

        Type::create([
            'en' => [
                'name' => 'Language'
            ],
            'nl' => [
                'name' => 'Taal'
            ],
            'fr' => [
                'name' => 'Langue'
            ],
        ]);
    }
}
