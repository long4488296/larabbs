<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUserRankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_user_rank', function(Blueprint $table)
		{
			$table->boolean('rank_id')->primary();
			$table->string('rank_name', 30)->default('');
			$table->integer('min_points')->unsigned()->default(0);
			$table->integer('max_points')->unsigned()->default(0);
			$table->boolean('discount')->default(0);
			$table->boolean('show_price')->default(1);
			$table->boolean('special_rank')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_user_rank');
	}

}
