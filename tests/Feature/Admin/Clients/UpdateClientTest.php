<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\ClientItem\Models\ClientItem;
use Illuminate\Http\Response;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a guest can update a client(): void
    {
        [$client, $items, $formData] = $this->prepareClientItemsData();

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $this->assertSame($formData['name'], $client->fresh()->name);
        $this->assertSame(3, $client->fresh()->items()->count());
    }

    /**
     * @test
     */
    public function a guest can update client items(): void
    {
        [$client, $items, $formData] = $this->prepareClientItemsData();

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $this->assertSame($formData['name'], $client->fresh()->name);
        $this->assertSame(3, $client->fresh()->items()->count());

        [$item1, $item2, $item3] = $items;

        $this->assertSame($formData['items'][0]['type'], $item1->fresh()->type);
        $this->assertSame($formData['items'][1]['type'], $item2->fresh()->type);
        $this->assertSame($formData['items'][2]['type'], $item3->fresh()->type);
    }

    /**
     * @test
     */
    public function test client items locale (): void
    {
        $clientType = ClientItem::PHILOSOPHY;
        [$client, $savedItems, $formData] = $this->prepareClientItemsData(['type' => $clientType]);

        [$item1, $item2, $item3] = $savedItems;
        $locales = config('app.available_locales');

        $locale = $locales['English'];

        $this->assertSame($clientType, $item1->type_locale);
        $this->assertSame($formData['items'][0]['title'][$locale], $item1->title_locale);
        $this->assertSame($formData['items'][0]['paragraph'][$locale], $item1->paragraph_locale);

        $locale = $locales['Dutch'];
        session()->put('locale', $locale);

        $clientType = __($clientType, [], $locale);

        $this->assertSame($clientType, $item1->type_locale);
        $this->assertSame($formData['items'][0]['title'][$locale], $item1->title_locale);
        $this->assertSame($formData['items'][0]['paragraph'][$locale], $item1->paragraph_locale);
    }

    /**
     * @test
     */
    public function a guest cant update a client with invalid ID (): void
    {
        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => 222]), [])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * @test
     *
     * @dataProvider invalidData
     */
    public function a guest can not update a client and items with invalid data(array $formData, array $errors): void
    {
        [$client, $savedItems, $data] = $this->prepareClientItemsData();

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertSessionHasErrors($errors);
    }

    public function invalidData(): array
    {
        return [
            'name and items' => [
                [],
                [
                    'name' => 'The name field is required.',
                    'items' => 'The items field is required.',
                ],
            ],
            'invalid items' => [
                [
                    'name' => 'Robert quote',
                    'items' => [
                        [
                            'id' => 5,
                            'type' => 'WrongType',
                        ],
                    ],
                ],
                [
                    'items' => 'The items must have at least 3 items.',
                    'items.0.type' => 'The selected type is invalid.',

                    'items.0.title.en' => 'The english title field is required.',
                    'items.0.title.fr' => 'The french title field is required.',
                    'items.0.title.nl' => 'The dutch title field is required.',

                    'items.0.paragraph.en' => 'The english paragraph field is required.',
                    'items.0.paragraph.fr' => 'The french paragraph field is required.',
                    'items.0.paragraph.nl' => 'The dutch paragraph field is required.',
                ],
            ],
            'invalid items 2' => [
                [
                    'name' => 'Robert quote',
                    'items' => [
                        [
                            'id' => 1,
                            'type' => 'Philosophy',
                            'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                            'title' => ['en' => 'Soren Kierkegaard quote xx', 'fr' => 'Soren Kierkegaard citation', 'nl' => 'Soren Kierkegaard citaat'],
                        ],
                        [
                            'id' => 2,
                            'type' => 'Wisdom',
                            'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                            'title' => ['en' => 'Soren Kierkegaard quote xx', 'fr' => 'Soren Kierkegaard citation', 'nl' => 'Soren Kierkegaard citaat'],
                        ],
                        [
                            'id' => 3,
                            'type' => 'Wisdom',
                            'paragraph' => ['en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard xx', 'fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard", 'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
                        ],
                    ],
                ],
                [
                    'items.2.title.en' => 'The english title field is required.',
                    'items.2.title.fr' => 'The french title field is required.',
                    'items.2.title.nl' => 'The dutch title field is required.',
                ],
            ],
        ];
    }
}
