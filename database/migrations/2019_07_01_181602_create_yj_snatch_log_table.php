<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSnatchLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_snatch_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->boolean('snatch_id')->default(0)->index('snatch_id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->decimal('bid_price', 10)->default(0.00);
			$table->integer('bid_time')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_snatch_log');
	}

}
