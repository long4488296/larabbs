<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_stats', function(Blueprint $table)
		{
			$table->integer('access_time')->unsigned()->default(0)->index('access_time');
			$table->string('ip_address', 15)->default('');
			$table->smallInteger('visit_times')->unsigned()->default(1);
			$table->string('browser', 60)->default('');
			$table->string('system', 20)->default('');
			$table->string('language', 20)->default('');
			$table->string('area', 30)->default('');
			$table->string('referer_domain', 100)->default('');
			$table->string('referer_path', 200)->default('');
			$table->string('access_url')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_stats');
	}

}
