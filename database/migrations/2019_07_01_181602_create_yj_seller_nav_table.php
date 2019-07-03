<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerNavTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_nav', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nav_name', 50)->comment('导航名称');
			$table->string('nav_link', 100)->comment('导航链接');
			$table->smallInteger('nav_order')->default(0)->comment('导航排序');
			$table->boolean('is_show')->default(0)->comment('是否显示');
			$table->boolean('is_blank')->default(0)->comment('是否新窗口打开');
			$table->string('nav_img', 100)->comment('导航图标');
			$table->boolean('is_text')->default(1)->comment('显示文字还是图片默认显示文字');
			$table->integer('seller_id');
			$table->integer('s_cid')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_nav');
	}

}
