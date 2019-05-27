<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = [];
		$faker = Faker::create();
		foreach (range(1,25) as $index)
		{
			$data[] = [
				'name' => $faker->catchPhrase,
			];
		}

		DB::table('skills')->insert($data);

    }
}
