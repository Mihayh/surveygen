<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        foreach(range(1,60) as $value){
        	\App\Models\Question::create([
        		'type' => 'text',
	        	'order' => rand(1,15),
	        	'survey_id' => rand(1,10),
	        	'question' => $faker->text . '?',
        	]);
        }
    }
}
