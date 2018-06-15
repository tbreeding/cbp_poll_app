<?php

use Illuminate\Database\Seeder;

class PollsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('polls')->insert([
                'name' => 'Poll-'.$i,
                'description' => 'Poll Description for Poll-'.$i,
                'choice_style' => 0,
                'user_id' => 1
            ]);
        }
        
    }
}
