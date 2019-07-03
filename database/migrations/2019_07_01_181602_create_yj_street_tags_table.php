<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjStreetTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_street_tags', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tag_name', 10)->comment('店铺街标签文字');
			$table->boolean('tags_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_street_tags');
	}

}
