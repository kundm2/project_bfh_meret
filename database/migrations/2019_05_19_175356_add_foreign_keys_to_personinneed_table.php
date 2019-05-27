<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersoninneedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personinneed', function(Blueprint $table)
		{
			$table->foreign('user_id', 'personinneed_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('pathology_id', 'personinneed_ibfk_2')->references('id')->on('pathology')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('personinneed', function(Blueprint $table)
		{
			$table->dropForeign('personinneed_ibfk_1');
			$table->dropForeign('personinneed_ibfk_2');
		});
	}

}
