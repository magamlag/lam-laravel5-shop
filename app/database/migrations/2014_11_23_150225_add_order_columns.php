<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order', function($table)
		{
			$table->string('email', 100);
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('address');
			$table->integer('zip');
			$table->string('country', 50);
			$table->string('state', 100);
			$table->integer('phone');
			$table->text('description');
		});
	}

	public function down()
	{
		Schema::table('order', function($table)
		{
			$table->dropColumn('email');
			$table->dropColumn('first_name');
			$table->dropColumn('last_name');
			$table->dropColumn('address');
			$table->dropColumn('zip');
			$table->dropColumn('country');
			$table->dropColumn('state');
			$table->dropColumn('phone');
			$table->dropColumn('description');
		});
	}

}
