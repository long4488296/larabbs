<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCollectGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_collect_goods', function(Blueprint $table)
		{
			$table->increments('rec_id');
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->integer('add_time')->unsigned()->default(0);
			$table->boolean('is_attention')->default(0)->index('is_attention');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_collect_goods');
	}

}
