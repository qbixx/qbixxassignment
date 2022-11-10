<?php

declare(strict_types=1);

namespace Database\Seeders;


use Domain\Languages\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'Dutch', 'code' => 'nl'],
            ['name' => 'French', 'code' => 'fr']
        ];

        foreach($languages as $language){
            Language::create($language);
        }

    }
}
