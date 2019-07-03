<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods_cat', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0);
			$table->smallInteger('cat_id')->unsigned()->default(0);
			$table->smallInteger('seller_cat_id')->comment('商品对应的入驻商家分类');
			$table->primary(['goods_id','cat_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods_cat');
	}

}
