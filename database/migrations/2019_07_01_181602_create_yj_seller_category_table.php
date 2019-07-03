<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_category', function(Blueprint $table)
		{
			$table->smallInteger('seller_cat_id', true)->unsigned();
			$table->string('cat_name', 90)->default('');
			$table->string('keywords')->default('');
			$table->string('cat_desc')->default('');
			$table->smallInteger('parent_id')->unsigned()->default(0)->index('parent_id');
			$table->boolean('sort_order')->default(50);
			$table->string('template_file', 50)->default('');
			$table->string('measure_unit', 15)->default('');
			$table->boolean('show_in_nav')->default(0);
			$table->string('style', 150);
			$table->boolean('is_show')->default(1);
			$table->boolean('grade')->default(0);
			$table->string('filter_attr')->default('0');
			$table->boolean('is_top_style')->default(0);
			$table->boolean('is_on_top')->default(0);
			$table->string('cat_img', 100)->comment('分类图片');
			$table->integer('seller_id')->comment('入驻商家id');
			$table->boolean('is_text')->default(1)->comment('显示文字还是图片默认显示文字文字');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_category');
	}

}
