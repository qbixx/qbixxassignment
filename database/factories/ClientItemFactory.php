<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\ClientItem\Models\ClientItem;
use Domain\Clients\Models\Client;
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

    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'type' => $this->faker->randomElement([ClientItem::DESIGN, ClientItem::PHILOSOPHY, ClientItem::WISDOM]),
            'paragraph' => ["en"=>"Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx","fr"=>"La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard","nl"=>"Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard"],
            'title' => ["en" => "Soren Kierkegaard quote xx","fr" => "Soren Kierkegaard citation","nl" => "Soren Kierkegaard citaat"]
        ];
    }
}
