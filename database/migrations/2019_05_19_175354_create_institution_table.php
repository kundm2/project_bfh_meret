<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstitutionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institution', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('company')->nullable();
			$table->string('first_name')->nullable();
			$table->string('name')->nullable();
			$table->string('address')->nullable();
			$table->integer('postcode')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('institution');
	}

}
