<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjArticleCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_article_cat', function(Blueprint $table)
		{
			$table->smallInteger('cat_id', true);
			$table->string('cat_name')->default('');
			$table->boolean('cat_type')->default(1)->index('cat_type');
			$table->string('keywords')->default('');
			$table->string('cat_desc')->default('');
			$table->boolean('sort_order')->default(50)->index('sort_order');
			$table->boolean('show_in_nav')->default(0);
			$table->smallInteger('parent_id')->unsigned()->default(0)->index('parent_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_article_cat');
	}

}
