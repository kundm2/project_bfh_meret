<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name')->nullable();
			$table->string('phone')->nullable();
			$table->string('website')->nullable();
			$table->text('description')->nullable();
			$table->integer('category_id')->nullable()->index('category_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service');
	}

}
