<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

use Illuminate\Database\Seeder;

class UsersQuestionsAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('answers')->delete();
    	\DB::table('questions')->delete();
    	\DB::table('users')->delete();
    	
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
