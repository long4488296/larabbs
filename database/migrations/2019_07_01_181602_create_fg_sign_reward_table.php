<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgSignRewardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_sign_reward', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('day')->comment('签到当天');
			$table->string('reward', 20)->comment('奖励');
			$table->string('name', 50)->comment('奖励名称');
			$table->enum('type', array('1'))->default('1')->comment('奖励类型 银贝');
			$table->string('image')->comment('奖励图片');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_sign_reward');
	}

}
