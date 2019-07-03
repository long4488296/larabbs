<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjMGoodsGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_m_goods_gallery', function(Blueprint $table)
		{
			$table->increments('img_id');
			$table->integer('goods_id')->unsigned()->default(0);
			$table->string('m_img_url')->default('');
			$table->string('m_img_desc')->default('');
			$table->string('m_thumb_url')->default('');
			$table->string('m_img_original')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_m_goods_gallery');
	}

}
