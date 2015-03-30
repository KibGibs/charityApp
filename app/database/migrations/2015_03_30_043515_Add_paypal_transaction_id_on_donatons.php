<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaypalTransactionIdOnDonatons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donations', function(Blueprint $table)
		{
			$table->string('paypal_transaction_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donations', function(Blueprint $table)
		{
			$table->dropColumn('paypal_transaction_id');
		});
	}

}
