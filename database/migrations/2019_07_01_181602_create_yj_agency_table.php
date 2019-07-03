<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_agency', function(Blueprint $table)
		{
			$table->smallInteger('agency_id', true)->unsigned();
			$table->string('agency_name')->index('agency_name');
			$table->text('agency_desc', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_agency');
	}

}
