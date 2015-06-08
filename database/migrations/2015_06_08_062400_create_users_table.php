<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 100)->unique('email');
			$table->string('password', 100);
			$table->string('team_name', 100)->nullable();
			$table->string('leader_name', 20)->nullable();
			$table->string('mobile', 12);
			$table->string('school', 40)->nullable();
			$table->enum('type', ['user', 'admin']);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
