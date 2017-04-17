<?php

use Illuminate\Database\Seeder;

class PollAndOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'type' => 2
        ]);


        factory(App\User::class, 20)->create()->each(function($user) {
            $polls = $user->polls()->saveMany(factory(App\Poll::class, 3)->make());
            foreach ($polls as $poll) {
                $poll->options()->saveMany(factory(App\Option::class, 3)->make());
            }
        });
    }
}
