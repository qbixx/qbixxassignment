<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
  public function run(): void
  {
    $items = [
        [
            'title_en' => 'Soren Kierkegaard quote',
            'title_nl' => 'Soren Kierkegaard citaat',
            'title_fr' => 'Soren Kierkegaard citation',
            'description_en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard',
            'description_nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard',
            'description_fr' => "La vie n'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard",
            'type_en' => 'Wisdom',
            'type_nl' => 'Wijsheid',
            'type_fr' => 'Sagesse'
        ],
        [
            'title_en' => 'Mark Twain quote',
            'title_nl' => 'Mark Twain citaat',
            'title_fr' => 'Mark Twain citation',
            'description_en' => 'The two most important days in your life are the day you are born and the day you find out why – Mark Twain',
            'description_nl' => 'De twee belangrijkste dagen in je leven zijn de dag dat je geboren wordt en de dag dat je erachter komt waarom – Mark Twain',
            'description_fr' => 'Les deux jours les plus importants de votre vie sont le jour de votre naissance et le jour où vous découvrez pourquoi – Mark',
            'type_en' => 'Philosophy',
            'type_nl' => 'Filosofie',
            'type_fr' => 'Philosophie'
        ],
        [
            'title_en' => 'R.Buckminster Fuller quote',
            'title_nl' => 'R.Buckminster Fuller citaat',
            'title_fr' => 'R.Buckminster Fuller citation',
            'description_en' => 'When I am working on a problem, I never think about beauty but when I have finished, if the solution is not beautiful, I know it is wrong - R.Buckminster Fuller',
            'description_nl' => 'Als ik aan een probleem werk, denk ik nooit aan schoonheid, maar als ik klaar ben, als de oplossing niet mooi is, weet ik dat het verkeerd is – R.Buckminster Fuller',
            'description_fr' => "Quand je travaille sur un problème, je ne pense jamais à la beauté mais quand j'ai fini, si la solution n'est pas belle, je sais qu'elle est fausse – R.Buckminster Fuller",
            'type_en' => 'Design',
            'type_nl' => 'Ontwerp',
            'type_fr' => 'Conception'
        ],
    ];
    $clients = Client::factory()->count(5)->create();
    foreach ($clients as $client) {
      $itemsList = [];
      foreach ($items as $item) {
        $itemsList[] = new Item($item);
      }
      $client->items()->saveMany($itemsList);
    }
  }
}
