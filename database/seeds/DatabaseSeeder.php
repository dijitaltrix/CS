<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			CustomersSeeder::class,
			SkillsSeeder::class,
			StudentsSeeder::class,
		]);
	
		//TODO seed join tables with valid id's 
    }
}
