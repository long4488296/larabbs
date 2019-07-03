<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods_video', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('mp4_url')->nullable();
			$table->string('mp4_img')->nullable();
			$table->integer('video_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods_video');
	}

}
