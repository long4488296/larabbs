<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_tag', function(Blueprint $table)
		{
			$table->integer('tag_id', true);
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->string('tag_words')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_tag');
	}

}
