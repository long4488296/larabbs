<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPromotersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_promoters', function(Blueprint $table)
		{
			$table->increments('promoters_id')->comment('推广id');
			$table->integer('user_id')->unsigned()->comment('用户id');
			$table->string('promoters_sn', 10)->comment('推广码');
			$table->string('promoters_qrc_img')->comment('推广二维码图片路径');
			$table->integer('promoters_qrc_sn')->unsigned()->comment('二维码图片内推广码');
			$table->string('promoters_qrc_avatar')->nullable()->comment('二维码头像图片路径');
			$table->boolean('valid')->default(1)->comment('生效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_promoters');
	}

}
