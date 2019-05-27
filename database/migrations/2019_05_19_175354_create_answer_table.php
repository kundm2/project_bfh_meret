<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answer', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('answer')->nullable();
			$table->integer('report_id')->nullable()->index('report_id');
			$table->integer('question_id')->nullable()->index('question_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answer');
	}

}
