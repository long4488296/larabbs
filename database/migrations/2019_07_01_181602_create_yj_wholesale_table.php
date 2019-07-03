<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjWholesaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_wholesale', function(Blueprint $table)
		{
			$table->increments('act_id');
			$table->integer('goods_id')->unsigned()->index('goods_id');
			$table->string('goods_name');
			$table->string('rank_ids');
			$table->text('prices', 65535);
			$table->boolean('enabled');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_wholesale');
	}

}
