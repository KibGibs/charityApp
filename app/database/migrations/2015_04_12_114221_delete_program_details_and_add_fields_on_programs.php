<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteProgramDetailsAndAddFieldsOnPrograms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('donation_detail');

		Schema::table('donations', function(Blueprint $table)
		{
			$table->integer('program_id')->unsigned()->nullable();
			$table->integer('activity_id')->unsigned()->nullable();

			$table->foreign('program_id')
				->references('id')->on('program')
				->onDelete('cascade');

			$table->foreign('activity_id')
				->references('id')->on('activity')
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
		Schema::create('donation_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('donation_id')->unsigned()->nullable();
			$table->integer('activity_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('donation_id')
				->references('id')->on('donations')
				->onDelete('cascade');
				
			$table->foreign('activity_id')
				->references('id')->on('activity')
				->onDelete('cascade');
		});

		Schema::table('donations', function(Blueprint $table)
		{
			$table->dropForeign('donations_activity_id_foreign');
			$table->dropForeign('donations_program_id_foreign');
			
			$table->dropColumn('activity_id');
			$table->dropColumn('program_id');
			
		});


	}

}
