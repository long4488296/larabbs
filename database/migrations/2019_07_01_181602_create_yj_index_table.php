<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjIndexTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_index', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titile')->comment('标题	');
			$table->boolean('isshow')->default(1)->comment('1:正在使用 2:过期');
			$table->string('type')->comment('xin:新品 jing：精品 re：最热');
			$table->string('imgpath')->comment('图片地址');
			$table->boolean('ad_type')->default(1)->comment('分类栏属性1.关联商品0，关联分类');
			$table->integer('a_id')->unsigned()->default(0)->comment('对应分类id');
			$table->string('goods_id', 50)->nullable()->comment('关联商品id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_index');
	}

}
