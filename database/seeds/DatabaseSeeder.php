<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskConstructionParameterValueSeeder::class);
        $this->call(TaskTechnicalParameterValueSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(ContactsSeeder::class);
    }
}
