<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCatRecommendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_cat_recommend', function(Blueprint $table)
		{
			$table->smallInteger('cat_id');
			$table->boolean('recommend_type');
			$table->primary(['cat_id','recommend_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_cat_recommend');
	}

}
