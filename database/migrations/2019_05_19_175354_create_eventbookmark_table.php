<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventbookmarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventbookmark', function(Blueprint $table)
		{
			$table->integer('user_id')->nullable()->index('user_id');
			$table->integer('event_id')->nullable()->index('event_id');
			$table->string('note')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventbookmark');
	}

}
