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
        factory(App\Poll::class, 5)->create()->each(function($poll) {
            $poll->options()->save(factory(App\Option::class)->make());
            $poll->options()->save(factory(App\Option::class)->make());
            $poll->options()->save(factory(App\Option::class)->make());
        });
    }
}
