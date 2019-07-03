<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUserFeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_user_feed', function(Blueprint $table)
		{
			$table->increments('feed_id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->integer('value_id')->unsigned()->default(0);
			$table->integer('goods_id')->unsigned()->default(0);
			$table->boolean('feed_type')->default(0);
			$table->boolean('is_feed')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_user_feed');
	}

}
