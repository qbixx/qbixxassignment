<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Client\ClientArticleTypesEnum;
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
                            "en-US" => "Soren Kierkegaard quote",
                            "nl-NL" => "Soren Kierkegaard citaat",
                            "fr-FR" => "Soren Kierkegaard citation",
                        ],
                        'type' => [
                            "en-US" => ClientArticleTypesEnum::WISDOM,
                            "nl-NL" => ClientArticleTypesEnum::WISDOM,
                            "fr-FR" => ClientArticleTypesEnum::WISDOM,
                        ],
                        'paragraph' => [
                            "en-US" =>
                                "Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard",
                            "nl-NL" =>
                                "Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard",
                            "fr-FR" =>
                                "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard",
                        ],
                    ],
                    [
                        'title' => [
                            "en-US" => "Mark Twain quote",
                            "nl-NL" => "Mark Twain citaat",
                            "fr-FR" => "Mark Twain citaat",
                        ],
                        'type' => [
                            "en-US" => ClientArticleTypesEnum::PHILOSOPHY,
                            "nl-NL" => ClientArticleTypesEnum::PHILOSOPHY,
                            "fr-FR" => ClientArticleTypesEnum::PHILOSOPHY,
                        ],
                        'paragraph' => [
                            "en-US" =>
                                "The two most important days in your life are the day you are born and the day you find out why – Mark Twain",
                            "nl-NL" =>
                                "De twee belangrijkste dagen in je leven zijn de dag dat je geboren wordt en de dag dat je erachter komt waarom – Mark Twain",
                            "fr-FR" =>
                                "Les deux jours les plus importants de votre vie sont le jour de votre naissance et le jour où vous découvrez pourquoi – Mark Twain",
                        ],
                    ],
                    [
                        'title' => [
                            "en-US" => "R.Buckminster Fuller quote",
                            "nl-NL" => "R.Buckminster Fuller citaat",
                            "fr-FR" => "R.Buckminster Fuller citation",
                        ],
                        'type' => [
                            "en-US" => ClientArticleTypesEnum::DESIGN,
                            "nl-NL" => ClientArticleTypesEnum::DESIGN,
                            "fr-FR" => ClientArticleTypesEnum::DESIGN,
                        ],
                        'paragraph' => [
                            "en-US" =>
                                "When I am working on a problem, I never think about beauty but when I have finished, if the solution is not beautiful, I know it is wrong - R.Buckminster Fuller",
                            "nl-NL" =>
                                "Als ik aan een probleem werk, denk ik nooit aan schoonheid, maar als ik klaar ben, als de oplossing niet mooi is, weet ik dat het verkeerd is – R.Buckminster Fuller",
                            "fr-FR" =>
                                "Quand je travaille sur un problème, je ne pense jamais à la beauté mais quand j'ai fini, si la solution n'est pas belle, je sais qu'elle est fausse – R.Buckminster Fuller",
                        ],
                    ],
                ]);
            })
            ->create();
    }
}
