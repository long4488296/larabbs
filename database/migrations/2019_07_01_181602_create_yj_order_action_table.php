<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjOrderActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_order_action', function(Blueprint $table)
		{
			$table->increments('action_id');
			$table->integer('order_id')->unsigned()->default(0)->index('order_id');
			$table->string('action_user', 30)->default('');
			$table->boolean('order_status')->default(0);
			$table->boolean('shipping_status')->default(0);
			$table->boolean('pay_status')->default(0);
			$table->boolean('action_place')->default(0);
			$table->string('action_note')->default('');
			$table->integer('log_time')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_order_action');
	}

}
