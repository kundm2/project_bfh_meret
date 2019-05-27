<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->text('content')->nullable();
			$table->string('type')->nullable();
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('activity');
	}

}
