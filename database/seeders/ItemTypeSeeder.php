<?php

namespace Database\Seeders;

use Domain\Clients\Models\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemType::create([
            'name' => [
                'en' => 'Wisdom',
                'nl' => 'Wijsheid',
                'fr' => 'Sagesse'
            ]
        ]);
        ItemType::create([
            'name' => [
                'en' => 'Philosophy',
                'nl' => 'Filosofie',
                'fr' => 'Philosophie'
            ]
        ]);
        ItemType::create([
            'name' => [
                'en' => 'Design',
                'nl' => 'Ontwerp',
                'fr' => 'Conception'
            ]
        ]);
    }
}
