<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods_article', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0);
			$table->integer('article_id')->unsigned()->default(0);
			$table->boolean('admin_id')->default(0);
			$table->primary(['goods_id','article_id','admin_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods_article');
	}

}
