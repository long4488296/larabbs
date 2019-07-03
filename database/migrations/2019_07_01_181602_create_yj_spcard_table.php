<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSpcardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_spcard', function(Blueprint $table)
		{
			$table->increments('id')->comment('购物劵ID');
			$table->integer('user_id')->unsigned()->index('user_id')->comment('生成卷用户ID');
			$table->string('spcard_sn', 60)->default('')->index('spcard_sn')->comment('购物劵sn');
			$table->decimal('user_money', 10)->default(0.00)->comment('购物劵面值');
			$table->integer('reg_time')->unsigned()->default(0)->comment('生成日期');
			$table->decimal('begin_money', 10)->nullable()->default(0.00);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_spcard');
	}

}
