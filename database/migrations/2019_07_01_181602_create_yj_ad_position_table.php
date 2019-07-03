<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAdPositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_ad_position', function(Blueprint $table)
		{
			$table->boolean('position_id')->primary();
			$table->string('position_name', 60)->default('');
			$table->smallInteger('ad_width')->unsigned()->default(0);
			$table->smallInteger('ad_height')->unsigned()->default(0);
			$table->string('position_desc')->default('');
			$table->text('position_style', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_ad_position');
	}

}
