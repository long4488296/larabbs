<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgSignInTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_sign_in', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->dateTime('last_sign_time')->comment('上次签到时间');
			$table->dateTime('time')->comment('签到时间');
			$table->string('week')->comment('当前周几');
			$table->integer('sign_count')->comment('签到次数');
			$table->integer('get_silver')->comment('7天或得银贝数量 1122345');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_sign_in');
	}

}
