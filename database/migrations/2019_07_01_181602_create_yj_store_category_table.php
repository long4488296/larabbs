<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjStoreCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_store_category', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cate_name', 50)->comment('分类名称');
			$table->smallInteger('cate_order')->default(0)->comment('分类排序');
			$table->boolean('is_show')->default(1)->comment('是否显示');
			$table->boolean('is_recom')->default(0)->comment('是否是推荐分类');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_store_category');
	}

}
