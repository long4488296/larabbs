<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgPtRewardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_pt_reward_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 150);
			$table->string('price', 10)->nullable()->comment('价格');
			$table->integer('seed_id')->nullable()->comment('对应种植种子id');
			$table->string('ptcode', 150)->nullable()->comment('对应拼团code值');
			$table->string('images')->nullable();
			$table->integer('reward_id')->nullable();
			$table->integer('goods_id')->nullable()->comment('商城商品id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_pt_reward_info');
	}

}
