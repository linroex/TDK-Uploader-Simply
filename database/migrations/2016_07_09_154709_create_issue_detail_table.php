<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_detail', function($table) {
			$table->increments('id');
			$table->integer('issue_id')->unsigned();
			$table->string('filename')->nullable();
			$table->string('desc')->nullable();
			$table->string('format')->nullable();

			$table->foreign('issue_id')->references('id')->on('issues');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('issue_detail');
	}

}
