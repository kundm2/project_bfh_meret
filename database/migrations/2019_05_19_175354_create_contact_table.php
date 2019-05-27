<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('company')->nullable();
			$table->string('first_name')->nullable();
			$table->string('name')->nullable();
			$table->string('address')->nullable();
			$table->integer('postcode')->nullable();
			$table->string('city')->nullable();
			$table->string('canton')->nullable();
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
		Schema::drop('contact');
	}

}
