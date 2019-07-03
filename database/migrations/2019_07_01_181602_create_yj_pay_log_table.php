<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPayLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_pay_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('order_id')->unsigned()->default(0);
			$table->integer('parent_log_id')->default(0);
			$table->decimal('order_amount', 10)->unsigned();
			$table->boolean('order_type')->default(0);
			$table->boolean('is_paid')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_pay_log');
	}

}
