<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_article', function(Blueprint $table)
		{
			$table->increments('article_id');
			$table->smallInteger('cat_id')->default(0)->index('cat_id');
			$table->string('title', 150)->default('');
			$table->text('content');
			$table->string('author', 30)->default('');
			$table->string('author_email', 60)->default('');
			$table->string('keywords')->default('');
			$table->boolean('article_type')->default(2);
			$table->boolean('is_open')->default(1);
			$table->integer('add_time')->unsigned()->default(0);
			$table->string('file_url')->default('');
			$table->boolean('open_type')->default(0);
			$table->string('link')->default('');
			$table->string('description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_article');
	}

}
