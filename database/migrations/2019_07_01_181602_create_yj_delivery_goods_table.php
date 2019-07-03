<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjDeliveryGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_delivery_goods', function(Blueprint $table)
		{
			$table->increments('rec_id');
			$table->integer('delivery_id')->unsigned()->default(0);
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->integer('product_id')->unsigned()->nullable()->default(0);
			$table->string('product_sn', 60)->nullable();
			$table->string('goods_name', 120)->nullable();
			$table->string('brand_name', 60)->nullable();
			$table->string('goods_sn', 60)->nullable();
			$table->boolean('is_real')->nullable()->default(0);
			$table->string('extension_code', 30)->nullable();
			$table->integer('parent_id')->unsigned()->nullable()->default(0);
			$table->smallInteger('send_number')->unsigned()->nullable()->default(0);
			$table->text('goods_attr', 65535)->nullable();
			$table->index(['delivery_id','goods_id'], 'delivery_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_delivery_goods');
	}

}
