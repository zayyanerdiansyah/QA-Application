<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create()->each(function($value)
        {
        	$value->questions()
                   ->saveMany(
                     Question::factory(rand(1,5))->make()
                   )
                   ->each(function($q){
                        $q->answers()
                        ->saveMany(
                          Answer::factory(rand(1,5))->make()
                        );
                   });
        });
    }
}
