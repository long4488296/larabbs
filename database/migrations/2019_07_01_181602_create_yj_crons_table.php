<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCronsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_crons', function(Blueprint $table)
		{
			$table->boolean('cron_id')->primary();
			$table->string('cron_code', 20)->index('cron_code');
			$table->string('cron_name', 120);
			$table->text('cron_desc', 65535)->nullable();
			$table->boolean('cron_order')->default(0);
			$table->text('cron_config', 65535);
			$table->integer('thistime')->default(0);
			$table->integer('nextime')->index('nextime');
			$table->boolean('day');
			$table->string('week', 1);
			$table->string('hour', 2);
			$table->string('minute');
			$table->boolean('enable')->default(1)->index('enable');
			$table->boolean('run_once')->default(0);
			$table->string('allow_ip', 100)->default('');
			$table->string('alow_files');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_crons');
	}

}
