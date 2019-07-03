<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUserSellerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_user_seller', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->unsigned()->comment('会员id');
			$table->boolean('is_check')->default(0)->comment('审核状态,0未审核，1审核通过，2审核不通过');
			$table->boolean('checkout_type')->default(0)->comment('结算类型0周，1月，2季度，3年');
			$table->decimal('use_fee', 10, 0)->comment('平台使用费');
			$table->decimal('deposit', 10, 0)->comment('商家保证金');
			$table->float('fencheng', 10, 0)->comment('分成百分比，只填数字');
			$table->string('remark', 100)->comment('商家的备注信息');
			$table->string('add_time', 20)->comment('添加或者跟新时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_user_seller');
	}

}
