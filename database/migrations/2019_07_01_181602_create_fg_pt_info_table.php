<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgPtInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_pt_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->comment('用户id');
			$table->integer('p_id')->nullable()->comment('拼团活动id');
			$table->string('p_code', 150)->nullable()->comment('拼团活动编号');
			$table->string('pt_order_code', 150)->nullable()->comment('拼团订单号');
			$table->string('pt_refund_code', 150)->nullable()->comment('拼团退款单号');
			$table->integer('ptgoods_id')->nullable()->comment('拼团商品id');
			$table->string('unit_price', 20)->nullable()->comment('拼团商品单价');
			$table->string('price', 20)->nullable()->comment('拼团付款价格');
			$table->integer('pay_num')->nullable()->comment('拼团购买数量');
			$table->dateTime('addtime')->nullable()->comment('参加拼团时间');
			$table->integer('pay_type')->nullable()->comment('付款类型 0 微信支付 1 银贝');
			$table->integer('ptstatus')->nullable()->comment('拼团状态 1:进行中（拼团中），2:拼团成功, 3：拼团失败 ');
			$table->string('refund_status')->nullable()->comment('退款状态 0失败 1成功');
			$table->integer('tips')->nullable()->default(0)->comment('是否提示用户 1已提示 0未提示');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_pt_info');
	}

}
