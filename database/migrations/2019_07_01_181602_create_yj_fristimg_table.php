<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjFristimgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_fristimg', function(Blueprint $table)
		{
			$table->integer('img_id', true);
			$table->integer('cat_id')->nullable()->comment('分类id');
			$table->string('path');
			$table->string('title');
			$table->boolean('is_show')->default(1)->comment('1 显示  0 不显示');
			$table->string('goods_id')->nullable()->comment('显示商品 英文半角逗号分隔');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_fristimg');
	}

}
