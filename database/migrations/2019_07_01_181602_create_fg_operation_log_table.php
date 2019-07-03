<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgOperationLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_operation_log', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable()->comment('用户id');
			$table->integer('friend_id')->nullable()->comment('好友id');
			$table->dateTime('time')->nullable()->comment('操作时间');
			$table->enum('type', array('0','1','2','3','4','5','6','8','7'))->nullable()->comment('事件类型 0种植1偷菜 2 使用道具 3出售 4转赠 5 发货 6购买道具 7购买种子 8银贝兑换金贝');
			$table->string('log')->nullable()->comment('说明');
			$table->integer('seed_id')->nullable()->comment('种子id');
			$table->integer('prop_id')->nullable()->comment('道具id');
			$table->integer('spend')->nullable()->comment('花费金贝数量');
			$table->string('spend_log', 150)->nullable()->comment('购买东西');
			$table->integer('is_one')->nullable()->comment('是否一次转赠');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_operation_log');
	}

}
