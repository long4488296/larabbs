<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerShopinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_shopinfo', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('商店id');
			$table->integer('seller_id')->comment('入驻商家id');
			$table->string('shop_name', 50)->index('shop_name')->comment('店铺名称');
			$table->string('shop_title', 50)->comment('店铺标题');
			$table->string('shop_keyword', 50)->comment('店铺关键字');
			$table->integer('country')->comment('所在国家');
			$table->integer('province')->comment('所在省份');
			$table->integer('city')->comment('所在城市');
			$table->string('shop_address', 50)->comment('详细地址');
			$table->string('kf_qq', 50)->comment('客服qq');
			$table->string('kf_ww', 50)->comment('客服旺旺');
			$table->string('kf_tel', 50)->comment('客服电话');
			$table->string('shop_logo', 100)->comment('店铺logo');
			$table->string('street_logo', 100)->comment('店铺街小logo');
			$table->string('street_spjpg', 100)->comment('店铺街商品大图');
			$table->string('notice', 100)->comment('店铺公告');
			$table->text('shop_header', 65535)->nullable()->comment('店铺头部');
			$table->string('shop_color', 20)->nullable()->comment('店铺整体色调');
			$table->boolean('shop_style')->default(1)->comment('店铺样式1显示左侧信息和分类，0不显示左侧信息和分类');
			$table->boolean('status')->default(1)->comment('店铺状态0关闭,1开启');
			$table->boolean('apply')->default(0)->comment('是否申请加入店铺街，0否，1是');
			$table->boolean('is_street')->default(0)->comment('是否以加入店铺街，0否，1是');
			$table->string('remark', 100)->comment('网站管理员备注信息');
			$table->integer('street_cate');
			$table->string('street_tags', 10);
			$table->boolean('street_order')->comment('店铺在店铺街的排序');
			$table->string('seller_theme', 50);
			$table->string('store_style', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_shopinfo');
	}

}
