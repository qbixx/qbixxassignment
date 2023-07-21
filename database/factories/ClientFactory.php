<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
        ];
    }
}
