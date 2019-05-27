<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointement', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->string('note')->nullable();
			$table->integer('institution_id')->nullable()->index('institution_id');
			$table->integer('personinneed_id')->nullable()->index('personinneed_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointement');
	}

}
