<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIssueUploadNumColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('issues', function($table){
			$table->dropColumn('estimate_upload_num');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('issues', function($table) {
			$table->integer('estimate_upload_num')->unsigned();
		});
	}

}
