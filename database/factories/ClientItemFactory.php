<?php

namespace Database\Factories;

use Domain\Clients\Models\Type;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\ClientItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Clients\Models>
 */
class ClientItemFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ClientItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'paragraph' => $this->faker->paragraph,
            'client_id' => Client::all()->random()->id,
            'type_id' => Type::all()->random()->id
        ];
    }
}
