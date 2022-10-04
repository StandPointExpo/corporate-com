<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Contact;

class ContactsSeeder extends Seeder
{

    private $contacts = [
        'name' => 'standpoint-expo.com',
        'address' => 'International Exhibition Center Brovarsky Ave. 15 02002 Kyiv, Ukraine',
        'email' => 'our.team@standpoint-expo.com',
        'phone' => '+49 151 11065913'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $start = now();
        $this->command->info('Contacts Seeder Started...');

        $contact = Contact::create($this->contacts);

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));

    }
}
