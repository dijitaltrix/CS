<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
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
		foreach (range(1,15) as $index)
		{
			$first_name = (rand(0,1)) ? $faker->firstNameMale : $faker->firstNameFemale;
			$last_name = $faker->lastName;
			$domain_name = rand(0,3) ? $faker->freeEmailDomain : $faker->domainName;
			$data[] = [
				'name' => sprintf("%s %s", $first_name, $last_name),
				'email' => strtolower(sprintf("%s.%s@%s", $first_name, $last_name, $domain_name)),
			];
		}

		DB::table('customers')->insert($data);

    }
}
