<?php

use Faker\Factory as Faker;
use PragmaRX\Sdk\Services\Clients\Data\Repositories\ClientRepository;
use PragmaRX\Sdk\Services\Users\Data\Entities\UserActivation;
use PragmaRX\Sdk\Services\Users\Data\Entities\User;
use PragmaRX\Sdk\Services\Connect\Data\Entities\Connection;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	private $names = [];

	public function run()
	{
		DB::table('users')->delete();

		$clientRepository = app()->make('PragmaRX\Sdk\Services\Clients\Data\Repositories\ClientRepository');

		$faker = Faker::create();

		$antonio = User::create([
	         'first_name' => 'Antonio',
	         'last_name' => 'Ribeiro',
	         'username' => 'antonioribeiro',
	         'email'      => 'acr@antoniocarlosribeiro.com',
	         'password'   => 'foda-se',
	         'two_factor_google_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
	         'two_factor_sms_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
	         'two_factor_email_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
		     'is_admin' => true
        ]);

		UserActivation::create(
			[
				'user_id' => $antonio->id,
				'code' => $faker->randomDigit(),
				'completed' => true,
			]
		);

		$marco = User::create([
			'first_name' => 'Marco',
			'last_name' => 'Vianna',
			'username' => 'marcovianna',
			'email'      => 'mac.vianna@gmail.com',
			'password'   => 'mv',
			'two_factor_google_secret_key' => 'XCMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
			'two_factor_sms_secret_key' => 'XCMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
			'two_factor_email_secret_key' => 'XCMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
		]);

		UserActivation::create(
			[
				'user_id' => $marco->id,
				'code' => $faker->randomDigit(),
				'completed' => true,
			]
		);
	}

	private function createUsername($name)
	{
		$faker = Faker::create();

		$name = strtolower(str_replace(' ', '', $name));

		$name = preg_replace("/[^a-zA-Z0-9]+/", "", $name);

		while(in_array($name, $this->names))
		{
			$name = $name . $faker->numberBetween(1,9);
		}

		$this->names[] = $name;

		return $name;
	}

	/**
	 * @param $clientRepository
	 * @param $antonio
	 * @param $faker
	 */
	private function seedClients($clientRepository, $antonio, $faker)
	{
		$clientRepository->create(
			$antonio, $faker->firstName, $faker->lastName, $faker->email, $faker->date, $faker->hexcolor
		);
		$clientRepository->create(
			$antonio, $faker->firstName, $faker->lastName, $faker->email, $faker->date, $faker->hexcolor
		);
		$clientRepository->create(
			$antonio, $faker->firstName, $faker->lastName, $faker->email, $faker->date, $faker->hexcolor
		);
		$clientRepository->create(
			$antonio, $faker->firstName, $faker->lastName, $faker->email, $faker->date, $faker->hexcolor
		);

		foreach (range(1, 50)
		         as
		         $index)
		{
			$name = $faker->name;

			$user = User::create(
				[
					'first_name' => $name,
					'username' => $username = $this->createUsername($name),
					'email' => "acr+{$username}@antoniocarlosribeiro.com",
					'password' => 'foda-se',
					'two_factor_google_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
					'two_factor_sms_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
					'two_factor_email_secret_key' => '4CMLW2FWIOEUTY2HACIUPGNGGSCXPBES',
				]
			);

			// Activation will be random
			$now_seconds = date("s");
			if (($now_seconds - (2 * floor($now_seconds / 2))) == 0)
			{
				UserActivation::create(
					[
						'user_id' => $user->id,
						'code' => $faker->randomDigit(),
						'completed' => true,
					]
				);

				$now_seconds = date("s");
				if (($now_seconds - (2 * floor($now_seconds / 2))) == 0)
				{
					Connection::create(
						[
							'requestor_id' => $user->id,
							'requested_id' => $antonio->id,
							'authorized' => true,
						]
					);
				}
			}
		}
	}

}
