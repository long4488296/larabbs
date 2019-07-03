<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_vote', function(Blueprint $table)
		{
			$table->smallInteger('vote_id', true)->unsigned();
			$table->string('vote_name', 250)->default('');
			$table->integer('start_time')->unsigned()->default(0);
			$table->integer('end_time')->unsigned()->default(0);
			$table->boolean('can_multi')->default(0);
			$table->integer('vote_count')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_vote');
	}

}
