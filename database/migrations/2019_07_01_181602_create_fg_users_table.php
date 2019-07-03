<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->string('nickname', 100)->comment('用户昵称');
			$table->string('phone', 50)->nullable()->comment('手机号');
			$table->string('userimg')->nullable()->comment('用户头像');
			$table->dateTime('time')->nullable()->comment('登录时间');
			$table->string('user_group')->nullable()->comment('好友群组关系');
			$table->string('friend', 200)->nullable()->comment('用户好友关系');
			$table->string('openid', 150)->comment('微信第三方openid');
			$table->enum('is_game_user', array('0','1'))->comment('是否是游戏用户 1是 0不是');
			$table->string('uuid', 16)->nullable()->comment('用户唯一邀请码');
			$table->text('admin_group', 65535)->nullable()->comment('用户管理的群');
			$table->text('add_group', 65535)->nullable()->comment('用户添加的群');
			$table->integer('is_new')->nullable()->comment('是否是新用户第一次登陆 0 不是 1是');
			$table->integer('login_count')->nullable()->comment('登录总次数');
			$table->string('login_time', 150)->nullable()->comment('登录天数');
			$table->integer('bg_voice')->nullable()->default(1)->comment('背景音效');
			$table->integer('other_voice')->nullable()->default(1)->comment('其他音效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_users');
	}

}
