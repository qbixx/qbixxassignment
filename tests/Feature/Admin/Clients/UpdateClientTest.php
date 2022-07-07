<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\LocaleEnum;
use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Interfaces\Admin\Clients\Resources\EditClientResource;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    private Client $client;
    private array $formData;

    /**
     * @test
     *
     * @dataProvider validData
     */
    public function an admin can update a client with valid data(string $key, $value): void
    {
        Arr::set($this->formData, $key, $value);

        $response = $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $this->client]), $this->formData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $client = Client::findOrFail($this->client->id);

        $this->assertSame($this->formData['name'], $client->name);
        $this->assertCount(3, $client->items);

        $client->items->each(function (Item $item, $index): void {
            $this->assertSame($this->formData['items'][$index]['client_id'], $item->client_id);
            $this->assertSame($this->formData['items'][$index]['type'], $item->type->value);

            collect(LocaleEnum::cases())->each(function (LocaleEnum $locale) use ($item, $index): void {
                $translatables = [
                    'title',
                    'paragraph',
                ];

                foreach ($translatables as $translatable) {
                    $this->assertSame(
                        $this->formData['items'][$index][$translatable][$locale->value],
                        $item->getTranslation($translatable, $locale->value)
                    );
                }
            });
        });
    }

    public function validData(): array
    {
        return [
            'name' => ['name', 'Bar Foo'],
            'items.*.type' => ['items.0.type', 'philosophy'],
            'items.*.title.en' => ['items.0.title.en', 'Soren Kierkegaard quote'],
            'items.*.title.nl' => ['items.0.title.nl', 'Soren Kierkegaard citaat'],
            'items.*.title.fr' => ['items.0.title.fr', 'Soren Kierkegaard citation'],
            'items.*.paragraph.en' => ['items.0.paragraph.en', 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard'],
            'items.*.paragraph.nl' => ['items.0.paragraph.nl', 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard'],
            'items.*.paragraph.fr' => ['items.0.paragraph.fr', "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard"],
            // TODO...
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidData
     */
    public function an admin can not update a client with invalid data(string $key, $value, ?string $errors = null): void
    {
        Arr::set($this->formData, $key, $value);

        $response = $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $this->client]), $this->formData);
        $response->assertSessionHasErrors($errors ? [$key => $errors] : $key);
    }

    public function invalidData(): array
    {
        return [
            'name required' => ['name', ''],
            'name min 4' => ['name', 'fre'],
            'name max 30' => ['name', 'Do you know someone with a name longer than 30 characters?'],
            'items required' => ['items', [], 'The items field is required.'],
            'items array' => ['items', 'some string', 'The items must be an array.'],
            'items size:3' => ['items', [1, 2, 3, 4], 'The items must contain 3 items.'],
            'items.*.client_id required' => ['items.0.client_id', '', 'The client ID field is required.'],
            'items.*.type enum' => ['items.0.type', 'foo', 'The selected type is invalid.'],
            'items.*.title.nl' => ['items.0.title.nl', '', 'The title field is required.'],
            'items.*.title.nl' => ['items.0.title.nl', 'Sor', 'The title must be at least 4 characters.'],
            'items.*.paragraph.nl' => ['items.0.paragraph.nl', '', 'The paragraph field is required.'],
            'items.*.paragraph.nl' => ['items.0.paragraph.nl', 'Sor', 'The paragraph must be at least 40 characters.'],
            // TODO...
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = Client::factory()->create([
            'name' => 'Foo Bar',
        ]);

        $this->client = Client::findOrFail($this->client->id);

        $clientResource = EditClientResource::make($this->client)
            ->response(Request::create(route(RoutesEnum::ADMIN_EDIT_CLIENT, ['client' => $this->client]), 'GET'))
            ->getData(true);

        $this->formData = [
            'name' => $clientResource['name'],
            'items' => $clientResource['items'],
        ];
    }
}
