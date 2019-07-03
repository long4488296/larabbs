<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcsFavourableActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ecs_favourable_activity', function(Blueprint $table)
		{
			$table->smallInteger('act_id')->unsigned();
			$table->string('act_name');
			$table->integer('start_time')->unsigned();
			$table->integer('end_time')->unsigned();
			$table->string('user_rank');
			$table->boolean('act_range');
			$table->string('act_range_ext');
			$table->decimal('min_amount', 10)->unsigned();
			$table->decimal('max_amount', 10)->unsigned();
			$table->boolean('act_type');
			$table->decimal('act_type_ext', 10)->unsigned();
			$table->text('gift', 65535);
			$table->boolean('sort_order')->default(50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ecs_favourable_activity');
	}

}
