<?php

use PragmaRX\Support\Migration;

class AddAdminUserColumn extends Migration
{

	/**
	 * Table related to this migration.
	 *
	 * @var string
	 */

	private $table = 'users';

	private $foreign = '';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		$this->builder->table(
			$this->table,
			function ($table)
			{
				$table->boolean('is_admin')->default(false);
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function migrateDown()
	{
		$this->builder->table(
			$this->table,
			function ($table)
			{
				$table->dropColumn('is_admin');
			}
		);
	}
}
