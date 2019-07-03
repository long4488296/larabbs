<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgGameOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_game_order', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->comment('用户id');
			$table->dateTime('addtime')->comment('购买时间');
			$table->integer('total')->comment('总金额 ');
			$table->enum('type', array('2','1','3'))->nullable()->comment('商品类型 3拼团订单 1 银贝订单 2种子，道具购买订单');
			$table->string('order_num', 50)->comment('订单号');
			$table->string('content')->nullable()->comment('购买说明');
			$table->integer('goods_id')->nullable()->comment('商品id');
			$table->enum('status', array('0','2','1'))->nullable()->comment('状态 0失败 1完成 2未支付');
			$table->string('name', 150)->comment('商品名');
			$table->integer('buy_num')->nullable()->comment('购买数量');
			$table->string('transaction_id', 150)->nullable()->comment('微信交易单号[官方产生]');
			$table->string('ptcode', 150)->nullable()->comment('拼团属性');
			$table->string('group_id', 150)->nullable()->comment('拼团群id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_game_order');
	}

}
