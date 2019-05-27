<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('service', function(Blueprint $table)
		{
			$table->foreign('category_id', 'service_ibfk_1')->references('id')->on('service_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('service', function(Blueprint $table)
		{
			$table->dropForeign('service_ibfk_1');
		});
	}

}
