<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
        	\App\Models\Category::create([
        		'name' => $faker->name,
        		'description' => $faker->text,
         	]);
        }
    }
}
