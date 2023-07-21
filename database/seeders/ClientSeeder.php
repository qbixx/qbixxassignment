<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Client\ClientArticleTypesEnum;
use App\Enums\LanguagesEnum;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::factory()
            ->count(5)
            ->afterCreating(function (Client $client) {
                $client->articles()
                    ->createMany([
                    [
                        'title' => [
                            LanguagesEnum::ENGLISH->value => "Soren Kierkegaard quote",
                            LanguagesEnum::DUTCH->value => "Soren Kierkegaard citaat",
                            LanguagesEnum::FRENCH->value => "Soren Kierkegaard citation",
                        ],
                        'type' => [
                            LanguagesEnum::ENGLISH->value => ClientArticleTypesEnum::WISDOM,
                            LanguagesEnum::DUTCH->value => ClientArticleTypesEnum::WISDOM,
                            LanguagesEnum::FRENCH->value => ClientArticleTypesEnum::WISDOM,
                        ],
                        'paragraph' => [
                            LanguagesEnum::ENGLISH->value =>
                                "Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard",
                            LanguagesEnum::DUTCH->value =>
                                "Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard",
                            LanguagesEnum::FRENCH->value =>
                                "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard",
                        ],
                    ],
                    [
                        'title' => [
                            LanguagesEnum::ENGLISH->value => "Mark Twain quote",
                            LanguagesEnum::DUTCH->value => "Mark Twain citaat",
                            LanguagesEnum::FRENCH->value => "Mark Twain citaat",
                        ],
                        'type' => [
                            LanguagesEnum::ENGLISH->value => ClientArticleTypesEnum::PHILOSOPHY,
                            LanguagesEnum::DUTCH->value => ClientArticleTypesEnum::PHILOSOPHY,
                            LanguagesEnum::FRENCH->value => ClientArticleTypesEnum::PHILOSOPHY,
                        ],
                        'paragraph' => [
                            LanguagesEnum::ENGLISH->value =>
                                "The two most important days in your life are the day you are born and the day you find out why – Mark Twain",
                            LanguagesEnum::DUTCH->value =>
                                "De twee belangrijkste dagen in je leven zijn de dag dat je geboren wordt en de dag dat je erachter komt waarom – Mark Twain",
                            LanguagesEnum::FRENCH->value =>
                                "Les deux jours les plus importants de votre vie sont le jour de votre naissance et le jour où vous découvrez pourquoi – Mark Twain",
                        ],
                    ],
                    [
                        'title' => [
                            LanguagesEnum::ENGLISH->value => "R.Buckminster Fuller quote",
                            LanguagesEnum::DUTCH->value => "R.Buckminster Fuller citaat",
                            LanguagesEnum::FRENCH->value => "R.Buckminster Fuller citation",
                        ],
                        'type' => [
                            LanguagesEnum::ENGLISH->value => ClientArticleTypesEnum::DESIGN,
                            LanguagesEnum::DUTCH->value => ClientArticleTypesEnum::DESIGN,
                            LanguagesEnum::FRENCH->value => ClientArticleTypesEnum::DESIGN,
                        ],
                        'paragraph' => [
                            LanguagesEnum::ENGLISH->value =>
                                "When I am working on a problem, I never think about beauty but when I have finished, if the solution is not beautiful, I know it is wrong - R.Buckminster Fuller",
                            LanguagesEnum::DUTCH->value =>
                                "Als ik aan een probleem werk, denk ik nooit aan schoonheid, maar als ik klaar ben, als de oplossing niet mooi is, weet ik dat het verkeerd is – R.Buckminster Fuller",
                            LanguagesEnum::FRENCH->value =>
                                "Quand je travaille sur un problème, je ne pense jamais à la beauté mais quand j'ai fini, si la solution n'est pas belle, je sais qu'elle est fausse – R.Buckminster Fuller",
                        ],
                    ],
                ]);
            })
            ->create();
    }
}
