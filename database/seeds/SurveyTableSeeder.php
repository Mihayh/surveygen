<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,10) as $value){
        	App\Models\Survey::create([
        		'name' => $faker->name,
        		'description' => $faker->text,
        		'user_id' => 1,
        		'category_id' => rand(1,10),
        	]);
        }
    }
}
