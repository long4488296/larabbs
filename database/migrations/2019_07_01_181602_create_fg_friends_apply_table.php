<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgFriendsApplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_friends_apply', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->comment('用户user_id');
			$table->integer('friend_id')->comment('好友user_id');
			$table->dateTime('time')->comment('添加时间');
			$table->enum('status', array('2','1','0'))->default('2')->comment('添加好友状态 0忽略 1同意 2等待');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_friends_apply');
	}

}
