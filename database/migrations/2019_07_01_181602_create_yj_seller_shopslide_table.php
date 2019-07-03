<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerShopslideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_shopslide', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('主键id');
			$table->integer('seller_id')->default(0)->comment('入驻商家id');
			$table->string('img_url', 100)->comment('图片地址');
			$table->string('img_link', 100)->comment('图片超链接');
			$table->string('img_desc', 50)->comment('图片描述');
			$table->smallInteger('img_order')->default(0)->comment('排序');
			$table->string('slide_type', 50)->default('roll')->comment('图片变换方式\'roll\',\'shade\',默认是\'roll\'');
			$table->boolean('is_show')->default(0)->comment('是否显示');
			$table->string('seller_theme', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_shopslide');
	}

}
