<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjOrderGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_order_goods', function(Blueprint $table)
		{
			$table->increments('rec_id');
			$table->integer('order_id')->unsigned()->default(0)->index('order_id');
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->string('goods_name', 120)->default('');
			$table->string('goods_sn', 60)->default('');
			$table->integer('product_id')->unsigned()->default(0);
			$table->smallInteger('goods_number')->unsigned()->default(1);
			$table->decimal('market_price', 10)->default(0.00);
			$table->decimal('goods_price', 10)->default(0.00);
			$table->text('goods_attr', 65535);
			$table->smallInteger('send_number')->unsigned()->default(0);
			$table->boolean('is_real')->default(0);
			$table->string('extension_code', 30)->default('');
			$table->integer('parent_id')->unsigned()->default(0);
			$table->smallInteger('is_gift')->unsigned()->default(0);
			$table->string('goods_attr_id')->default('');
			$table->integer('goods_userid')->comment('用户id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_order_goods');
	}

}
