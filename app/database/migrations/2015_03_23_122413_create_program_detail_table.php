<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('program_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('program_id')->unsigned()->nullable();
			$table->decimal('cost', 16, 4); // 100 billion maximum
			$table->integer('qty');
			$table->date('start_date');
			$table->date('end_date');
			$table->timestamps();
			
			$table->foreign('program_id')
				->references('id')->on('program')
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
		Schema::drop('program_detail');
	}

}
