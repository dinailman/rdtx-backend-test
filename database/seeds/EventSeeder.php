<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = factory(\App\Events::class, 5)->create([
            'user_id'  => 1,
        ]);
    }
}
