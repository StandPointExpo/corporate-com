<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();
        $this->command->info('Language Seeder Started...');
        foreach (Language::LANGUAGES as $LANGUAGE) {
            factory(Language::class)->create([
               'name' => $LANGUAGE,
            ]);
        }

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));
    }
}
