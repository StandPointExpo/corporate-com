<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    private $users = [
            [
                'name'      => 'Administrator',
                'username'  => 'admin',
                'email'     => 'admin@site.com',
                'password'  => 'password'
            ]
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
        $this->command->info('Users Seeder Started...');

        foreach ($this->users as $user) {
            $user = collect($user);
            $user = User::create([
                'name'      => $user->get('name'),
                'username'  => $user->get('username'),
                'password'  => Hash::make($user->get('password')),
                'email'     => $user->get('email'),
                'email_verified_at' => now()
            ]);
        }

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));
    }
}
