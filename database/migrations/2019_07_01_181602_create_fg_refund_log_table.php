<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgRefundLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_refund_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->comment('用户id');
			$table->string('admin_user', 150)->nullable()->comment('管理员名称');
			$table->string('refund_order_sn', 150)->nullable()->comment('退款单号');
			$table->string('amount', 150)->nullable()->comment('退款金额');
			$table->dateTime('add_time')->nullable()->comment('记录插入时间');
			$table->dateTime('paid_time')->nullable()->comment('记录更新时间');
			$table->string('note')->nullable()->comment('备注');
			$table->integer('payment')->nullable()->comment('退款渠道 1微信退款 2银贝退款');
			$table->integer('refund_status')->nullable()->default(0)->comment('退款状态 0退款中 1退款成功 2退款失败');
			$table->string('refund_id', 150)->nullable()->comment('微信内部退款单号');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_refund_log');
	}

}
