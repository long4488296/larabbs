<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjApidArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_apid_article', function(Blueprint $table)
		{
			$table->increments('article_id')->comment('文章id');
			$table->string('title', 50)->comment('文章标题');
			$table->text('content')->comment('文章内容');
			$table->string('author', 50)->comment('文章作者');
			$table->boolean('isopen')->default(1)->comment('是否显示');
			$table->integer('add_time')->unsigned()->comment('添加时间');
			$table->decimal('money', 10)->comment('文章价钱');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_apid_article');
	}

}
