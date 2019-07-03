<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerShopwindowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_shopwindow', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->smallInteger('win_type')->comment('橱窗类型0商品列表，1自定义内容');
			$table->smallInteger('win_order')->comment('橱窗排序');
			$table->text('win_goods', 65535)->nullable()->comment('橱窗商品');
			$table->string('win_name', 50)->comment('橱窗名称');
			$table->char('win_color', 10)->comment('橱窗色调');
			$table->string('win_img', 100)->comment('橱窗广告图片，暂时无用');
			$table->string('win_img_link', 100)->comment('广告图片链接，暂时无用');
			$table->integer('seller_id')->comment('入驻商id');
			$table->boolean('is_show')->default(0)->comment('是否显示');
			$table->text('win_custom', 65535)->comment('店铺自定义橱窗内容');
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
		Schema::drop('yj_seller_shopwindow');
	}

}
