<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPromotersRewardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_promoters_reward', function(Blueprint $table)
		{
			$table->increments('id')->comment('推广奖励id');
			$table->string('action', 20)->comment('推广奖励行为');
			$table->string('change_type', 20)->comment('推广奖励类型（user_money对应金贝，pay_piont对应银贝）');
			$table->integer('change_info')->unsigned()->comment('推广新人奖励金额');
			$table->integer('change_pro_info')->unsigned()->comment('推广者奖励金额');
			$table->string('change_desc', 20)->comment('推广奖励说明');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_promoters_reward');
	}

}
