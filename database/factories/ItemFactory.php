<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Services\Translator;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

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
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function type(ItemType $type)
    {
        return $this->state(function (array $attributes) use ($type) {
            return [
                'type' => $type,
            ];
        });
    }

    public function makeDefault(ItemType $type, Client $client): Item
    {
        $titleTranslations = Translator::getTranslations('qbixxassignment.items.'.$type->value.'.title');
        $paragraphTranslations = Translator::getTranslations('qbixxassignment.items.'.$type->value.'.paragraph');

        return $this
            ->type($type)
            ->for($client)
            ->make()
            ->replaceTranslations('title', $titleTranslations)
            ->replaceTranslations('paragraph', $paragraphTranslations);
    }

    public function makeDefaults(Client $client): Collection
    {
        return collect([
            $this->makeDefault(ItemType::Wisdom, $client),
            $this->makeDefault(ItemType::Philosophy, $client),
            $this->makeDefault(ItemType::Design, $client),
        ]);
    }
}
