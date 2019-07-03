<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjExchangeGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_exchange_goods', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0)->primary();
			$table->integer('exchange_integral')->unsigned()->default(0);
			$table->boolean('is_exchange')->default(0);
			$table->boolean('is_hot')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_exchange_goods');
	}

}
