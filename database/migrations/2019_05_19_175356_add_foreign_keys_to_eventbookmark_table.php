<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventbookmarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('eventbookmark', function(Blueprint $table)
		{
			$table->foreign('user_id', 'eventbookmark_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_id', 'eventbookmark_ibfk_2')->references('id')->on('event')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('eventbookmark', function(Blueprint $table)
		{
			$table->dropForeign('eventbookmark_ibfk_1');
			$table->dropForeign('eventbookmark_ibfk_2');
		});
	}

}
