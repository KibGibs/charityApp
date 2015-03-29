<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('program_detail', function(Blueprint $table)
		{
			$table->integer('activity_detail_id')->unsigned()->nullabe();
			
			$table->foreign('activity_detail_id')
				->references('id')->on('activity_detail')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('program_detail', function(Blueprint $table)
		{
			$table->dropForeign('program_detail_activity_detail_id_foreign');
			$table->dropColumn('activity_detail_id');
		});
	}

}
