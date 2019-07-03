<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgPtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_pt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('pt_name', 200)->nullable()->comment('拼团活动名称');
			$table->integer('ptgoods_id')->nullable()->comment(' 拼团商品id');
			$table->string('ptcode', 100)->nullable()->comment('拼团编号');
			$table->integer('ptnumber')->nullable()->comment('拼团人数');
			$table->string('ptprice', 20)->nullable()->comment('拼团商品总价');
			$table->dateTime('addtime')->nullable()->comment('拼团开始时间');
			$table->dateTime('endtime')->nullable()->comment('拼团结束时间');
			$table->string('images')->nullable()->comment('拼团展示商品图片');
			$table->integer('check')->nullable()->default(2)->comment('审核状态 0 未通过 1通过(立即参与) 2审核中');
			$table->integer('seller_id')->nullable()->comment('商家id');
			$table->integer('group_id')->nullable()->comment('当前活动所属群id');
			$table->integer('ptgoods_num')->nullable()->comment('拼团商品总份数');
			$table->integer('ptgoods_price_wx')->nullable()->comment('拼团商品价格 微信价格/单份');
			$table->integer('ptgoods_price_yb')->nullable()->comment('拼团商品价格 银贝价格/单份');
			$table->integer('status')->nullable()->comment('活动状态 0已过期 1 正常');
			$table->integer('is_refund')->nullable()->default(0)->comment('用户退款 是否退款 0 否 1是');
			$table->integer('reward_id')->nullable()->comment('奖励商品id');
			$table->string('no_info')->nullable()->comment('审核不通过的原因');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_pt');
	}

}
