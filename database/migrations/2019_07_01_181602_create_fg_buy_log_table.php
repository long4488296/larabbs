<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgBuyLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_buy_log', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('seed_id')->comment('种子id');
			$table->string('buynum', 50)->default('1')->comment('购买数量');
			$table->dateTime('buy_time')->comment('购买时间');
			$table->string('spend', 50)->nullable()->comment('花费多少费用');
			$table->integer('prop_id')->nullable()->comment('道具id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_buy_log');
	}

}
