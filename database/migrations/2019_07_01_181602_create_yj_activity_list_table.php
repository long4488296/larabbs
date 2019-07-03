<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjActivityListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_activity_list', function(Blueprint $table)
		{
			$table->increments('id')->comment('活动id');
			$table->string('a_name', 20)->comment('活动名称');
			$table->string('a_img', 100)->comment('活动图片');
			$table->string('a_goods')->comment('活动商品id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_activity_list');
	}

}
