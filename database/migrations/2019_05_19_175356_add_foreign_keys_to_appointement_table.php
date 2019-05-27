<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppointementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appointement', function(Blueprint $table)
		{
			$table->foreign('institution_id', 'appointement_ibfk_1')->references('id')->on('institution')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('personinneed_id', 'appointement_ibfk_2')->references('id')->on('personinneed')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('appointement', function(Blueprint $table)
		{
			$table->dropForeign('appointement_ibfk_1');
			$table->dropForeign('appointement_ibfk_2');
		});
	}

}
