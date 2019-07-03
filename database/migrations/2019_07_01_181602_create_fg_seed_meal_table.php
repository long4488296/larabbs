<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgSeedMealTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_seed_meal', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('z_id')->nullable()->comment('组合id');
			$table->integer('seed_id')->nullable()->comment('种子id');
			$table->dateTime('start_date')->comment('开始时间');
			$table->dateTime('end_date')->nullable()->comment('结束时间');
			$table->string('z_name', 150)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_seed_meal');
	}

}
