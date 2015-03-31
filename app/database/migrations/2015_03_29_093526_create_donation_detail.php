<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donation_detail');
	}

}
