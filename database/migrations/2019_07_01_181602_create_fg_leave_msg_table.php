<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgLeaveMsgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_leave_msg', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->integer('friend_id')->nullable();
			$table->string('friend_name', 50)->nullable()->comment('好友名字');
			$table->string('content')->nullable()->comment('留言内容');
			$table->string('user_name', 50)->nullable()->comment('用户名字');
			$table->dateTime('time')->nullable()->comment('留言时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_leave_msg');
	}

}
