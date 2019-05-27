<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('answer', function(Blueprint $table)
		{
			$table->foreign('report_id', 'answer_ibfk_1')->references('id')->on('report')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('question_id', 'answer_ibfk_2')->references('id')->on('question')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('answer', function(Blueprint $table)
		{
			$table->dropForeign('answer_ibfk_1');
			$table->dropForeign('answer_ibfk_2');
		});
	}

}
