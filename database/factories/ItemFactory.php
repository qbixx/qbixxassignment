<?php

namespace Database\Factories;

use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Items\Models>
 */
class ItemFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'paragraph' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['Wisdom', 'Philosophy', 'Design']),
        ];
    }
}
