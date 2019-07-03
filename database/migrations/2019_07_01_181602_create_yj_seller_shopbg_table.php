<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerShopbgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_shopbg', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('bgimg', 500)->comment('背景图片');
			$table->string('bgrepeat', 50)->default('no-repeat')->comment('背景图片重复');
			$table->string('bgcolor', 20)->comment('背景颜色');
			$table->boolean('show_img')->default(0)->comment('默认显示背景图片');
			$table->integer('is_custom')->default(0)->comment('是否自定义背景，默认为否');
			$table->integer('seller_id')->default(0)->comment('商家id');
			$table->string('seller_theme', 50)->comment('模板');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_shopbg');
	}

}
