<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_topic', function(Blueprint $table)
		{
			$table->increments('topic_id');
			$table->string('title')->default('\'\'');
			$table->text('intro', 65535);
			$table->integer('start_time')->default(0);
			$table->integer('end_time')->default(0);
			$table->text('data', 65535);
			$table->string('template')->default('\'\'');
			$table->text('css', 65535);
			$table->string('topic_img')->nullable();
			$table->string('title_pic')->nullable();
			$table->char('base_style', 6)->nullable();
			$table->text('htmls', 16777215)->nullable();
			$table->string('keywords')->nullable();
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
		Schema::drop('yj_topic');
	}

}
