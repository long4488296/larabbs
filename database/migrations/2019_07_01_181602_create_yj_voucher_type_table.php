<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVoucherTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_voucher_type', function(Blueprint $table)
		{
			$table->smallInteger('type_id', true)->unsigned()->comment('优惠券类型id');
			$table->smallInteger('type_cat_id')->unsigned()->comment('优惠券对应分类id');
			$table->string('type_name', 60)->comment('优惠券类型名');
			$table->decimal('type_money', 10)->unsigned()->comment('优惠券价值');
			$table->boolean('send_type')->default(3)->comment('发送类型0按用户等级会员名等1商品类别2订单额度3线下发送');
			$table->decimal('min_amout', 10)->unsigned()->nullable()->comment('如果按订单额度。定义最小金额');
			$table->decimal('max_amout', 10)->unsigned()->nullable();
			$table->integer('send_start_date')->unsigned()->comment('发送开始时间');
			$table->integer('send_end_date')->unsigned()->comment('发送结束时间');
			$table->integer('use_start_date')->unsigned()->comment('可用开始时间');
			$table->integer('use_end_date')->unsigned()->comment('过期时间');
			$table->decimal('min_goods_amout', 10)->unsigned()->comment('使用最低金额');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_voucher_type');
	}

}
