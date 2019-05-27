<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->date('issue_date')->nullable();
			$table->text('content')->nullable();
			$table->integer('user_id')->nullable()->index('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('report');
	}

}
