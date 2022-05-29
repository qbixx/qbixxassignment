<?php

declare(strict_types=1);

namespace Tests;

use Domain\ClientItem\Models\ClientItem;
use Domain\Clients\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    public function prepareClientItemsData(array $data = []): array
    {
        $client = Client::factory()->create();
        $items = ClientItem::factory(3)->create(['client_id' => $client->id] + $data);
        $formData = [
            'name' => 'Edited name',
            'items' => [
                [
                    'id' => $items[0]['id'],
                    'type' => 'Philosophy',
                    'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                    'title' => ['en' => 'Soren Kierkegaard quote xx', 'fr' => 'Soren Kierkegaard citation', 'nl' => 'Soren Kierkegaard citaat'],
                ],
                [
                    'id' => $items[1]['id'],
                    'type' => 'Wisdom',
                    'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                    'title' => ['en' => 'Soren Kierkegaard quote xx', 'fr' => 'Soren Kierkegaard citation', 'nl' => 'Soren Kierkegaard citaat'],
                ],
                [
                    'id' => $items[2]['id'],
                    'type' => 'Wisdom',
                    'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                    'title' => ['en' => 'Soren Kierkegaard quote xx', 'fr' => 'Soren Kierkegaard citation', 'nl' => 'Soren Kierkegaard citaat'],
                ],
            ],
        ];

        return [$client, $items, $formData];
    }
}
