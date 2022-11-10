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
            $typeModel = Type::create(['original_name' => $type['original_name']]);
            $typeModel->details()->createMany($type['details']);
        }

    }

    private function getTypes(): array
    {
        return [
            [
                'original_name' => 'Wisdom',
                'details' => [
                    ['language_id' => 1, 'name' => 'Wisdom'],
                    ['language_id' => 2, 'name' => 'Wijsheid'],
                    ['language_id' => 3, 'name' => 'Sagesse']
                ]
            ],
            [
                'original_name' => 'Philosophy',
                'details' => [
                    ['language_id' => 1, 'name' => 'Philosophy'],
                    ['language_id' => 2, 'name' => 'Filosofie'],
                    ['language_id' => 3, 'name' => 'Philosophie']
                ]
            ],
            [
                'original_name' => 'Design',
                'details' => [
                    ['language_id' => 1, 'name' => 'Design'],
                    ['language_id' => 2, 'name' => 'Ontwerp'],
                    ['language_id' => 3, 'name' => 'Conception']
                ]
            ],
        ];
    }
}
