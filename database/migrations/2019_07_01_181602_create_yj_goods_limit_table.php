<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsLimitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods_limit', function(Blueprint $table)
		{
			$table->increments('id')->comment('限购规则id');
			$table->integer('limit_number')->unsigned()->comment('限购份数');
			$table->integer('limit_time')->unsigned()->default(1)->comment('限购时长（天数，0为永久）');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods_limit');
	}

}
