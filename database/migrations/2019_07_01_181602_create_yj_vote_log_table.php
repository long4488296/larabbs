<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVoteLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_vote_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->smallInteger('vote_id')->unsigned()->default(0)->index('vote_id');
			$table->string('ip_address', 15)->default('');
			$table->integer('vote_time')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_vote_log');
	}

}
