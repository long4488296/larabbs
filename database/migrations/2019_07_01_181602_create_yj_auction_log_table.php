<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAuctionLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_auction_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('act_id')->unsigned()->index('act_id');
			$table->integer('bid_user')->unsigned();
			$table->decimal('bid_price', 10)->unsigned();
			$table->integer('bid_time')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_auction_log');
	}

}
