<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posting', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('posting_title',100);
			$table->date('posting_data');
			$table->text('post');
			$table->smallInteger('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posting');
	}

}
