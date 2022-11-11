<?php

namespace Database\Seeders;

use Domain\Types\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $types = $this->getTypes();

        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }

    }

    private function getTypes(): array
    {
        return [
            [
                "en" => "Wisdom",
                "nl" => "Wijsheid",
                "fr" => "Sagesse"
            ],
            [
                "en" => "Philosophy",
                "nl" => "Filosofie",
                "fr" => "Philosophie"
            ],
            [
                "en" => "Design",
                "nl" => "Ontwerp",
                "fr" => "Conception"
            ]

        ];
    }
}
