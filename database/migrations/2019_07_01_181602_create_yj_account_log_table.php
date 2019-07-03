<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAccountLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_account_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->decimal('user_money', 10);
			$table->decimal('real_money', 10)->default(0.00)->comment('充值真实金额');
			$table->decimal('gift_money', 10)->default(0.00)->comment('充值赠送金额');
			$table->decimal('frozen_money', 10);
			$table->integer('rank_points');
			$table->integer('pay_points');
			$table->integer('change_time')->unsigned();
			$table->string('change_desc');
			$table->boolean('change_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_account_log');
	}

}
