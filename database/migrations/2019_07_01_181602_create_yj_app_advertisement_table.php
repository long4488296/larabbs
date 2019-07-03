<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAppAdvertisementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_app_advertisement', function(Blueprint $table)
		{
			$table->integer('ad_id', true);
			$table->string('ad_title')->comment('广告标题');
			$table->text('ad_img', 65535)->comment('广告图片');
			$table->integer('ad_start')->comment('广告是否正常 1:正常  2:作废');
			$table->integer('ad_type')->comment('广告类型     0:分类  1:商品');
			$table->integer('ad_value')->comment('广告类型id 对应type');
			$table->string('ad_link')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_app_advertisement');
	}

}
