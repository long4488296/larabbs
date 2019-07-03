<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPointstomoneyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_pointstomoney', function(Blueprint $table)
		{
			$table->boolean('id')->primary()->comment('兑换规则id');
			$table->integer('proportion')->unsigned()->comment('比例除以100');
			$table->string('remarks', 100)->comment('备注');
			$table->integer('divisor')->unsigned()->default(100)->comment('被除数默认100');
			$table->boolean('logcat')->default(63)->comment('日志类型备注用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_pointstomoney');
	}

}
