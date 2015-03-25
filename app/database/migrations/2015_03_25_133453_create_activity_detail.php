<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('activity_id')->unsigned()->nullable();
			$table->integer('sub_activity_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('activity_id')
				->references('id')->on('activity')
				->onDelete('cascade');
				
			$table->foreign('sub_activity_id')
				->references('id')->on('sub_activity')
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
		Schema::drop('activity_detail');
	}

}
