<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUserBonusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_user_bonus', function(Blueprint $table)
		{
			$table->increments('bonus_id');
			$table->boolean('bonus_type_id')->default(0);
			$table->bigInteger('bonus_sn')->unsigned()->default(0);
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->integer('used_time')->unsigned()->default(0);
			$table->integer('order_id')->unsigned()->default(0);
			$table->boolean('emailed')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_user_bonus');
	}

}
