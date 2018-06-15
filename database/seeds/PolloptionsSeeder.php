<?php

use Illuminate\Database\Seeder;

class PolloptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('polloptions')->insert([
                'name' => 'Poll Option-'.$i,
                'choice_style' => 'radio',
                'poll_id' => 1
            ]);
        }
    }
}
