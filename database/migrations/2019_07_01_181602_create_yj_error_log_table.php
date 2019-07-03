<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjErrorLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_error_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('info');
			$table->string('file', 100);
			$table->integer('time')->index('time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_error_log');
	}

}
