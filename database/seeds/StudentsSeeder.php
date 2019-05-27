<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
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
		foreach (range(1,50) as $index)
		{
			$data[] = [
				'name' => $faker->name,
				'date_of_birth' => Crypt::encrypt($faker->date('Y-m-d', strtotime("-18 years"))),
			];
		}

		DB::table('students')->insert($data);

    }

}
