<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjRegionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_region', function(Blueprint $table)
		{
			$table->smallInteger('region_id', true)->unsigned();
			$table->smallInteger('parent_id')->unsigned()->default(0)->index('parent_id');
			$table->string('region_name', 120)->default('');
			$table->boolean('region_type')->default(2)->index('region_type');
			$table->smallInteger('agency_id')->unsigned()->default(0)->index('agency_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_region');
	}

}
