<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVoteOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_vote_option', function(Blueprint $table)
		{
			$table->smallInteger('option_id', true)->unsigned();
			$table->smallInteger('vote_id')->unsigned()->default(0)->index('vote_id');
			$table->string('option_name', 250)->default('');
			$table->integer('option_count')->unsigned()->default(0);
			$table->boolean('option_order')->default(100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_vote_option');
	}

}
