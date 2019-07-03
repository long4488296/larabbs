<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgPtRewardLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_pt_reward_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->string('p_code', 150)->comment('拼团code');
			$table->integer('reward_id')->comment('拼团奖励1大奖2优惠券3米砖4银贝');
			$table->dateTime('time')->comment('添加时间');
			$table->integer('type')->comment('拼团种类 1 大于350 0小于350');
			$table->integer('goods_id')->nullable()->comment('奖励商品id');
			$table->dateTime('use_time')->nullable()->comment('使用时间');
			$table->integer('is_use')->nullable()->default(0)->comment('是否使用 1是 0否');
			$table->integer('order_id')->nullable()->comment('订单id');
			$table->string('code', 100)->nullable()->comment('奖励兑换码');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_pt_reward_log');
	}

}
