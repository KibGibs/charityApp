<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBarangayIdToProgramDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('program_detail', function(Blueprint $table)
		{
			//
			$table->integer('barangay_id');
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
			//
			$table->dropColumn('barangay_id');
		});
	}

}
