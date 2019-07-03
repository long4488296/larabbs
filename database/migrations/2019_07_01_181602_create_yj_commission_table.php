<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_commission', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('seller_id')->default(0);
			$table->integer('prev_date')->comment('上次佣金结算时间');
			$table->integer('curr_date')->comment('当前时间');
			$table->decimal('total_turnover', 10)->comment('总营业额');
			$table->decimal('commission', 10)->comment('佣金');
			$table->decimal('check_mony', 10)->comment('结算');
			$table->integer('status')->default(1)->comment('返佣状态1未处理，2已结算');
			$table->integer('check_date')->comment('结算日期');
			$table->string('remark')->comment('备注');
			$table->string('operator', 50)->comment('转账人');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_commission');
	}

}
