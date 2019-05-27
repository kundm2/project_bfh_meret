<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersoninneedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personinneed', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('first_name')->nullable();
			$table->string('name')->nullable();
			$table->date('birthday')->nullable();
			$table->integer('user_id')->nullable()->index('user_id');
			$table->integer('pathology_id')->nullable()->index('pathology_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personinneed');
	}

}
