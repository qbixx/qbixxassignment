<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Clients\Models\Type;
use Illuminate\Database\Seeder;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\ClientItem;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::factory()->count(5)->create();

        $types = Type::all();

        Client::all()->each(function ($client) use ($types) {
            $types->each(fn ($type) => ClientItem::factory()->create([
                'type_id' => $type->id,
                'client_id' => $client->id,
                'en' => [
                    'title'     => 'Soren Kierkegaard quote',
                    'paragraph' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard'
                ],
                'nl' => [
                    'title'     => 'Soren Kierkegaard citaat',
                    'paragraph' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'
                ],
                'fr' => [
                    'title'     => 'Soren Kierkegaard citation',
                    'paragraph' => 'La vie n\'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard'
                ],
            ]));
        });
    }
}
