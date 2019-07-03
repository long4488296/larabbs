<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSmsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_sms_log', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->string('phone', 20)->comment('手机号');
			$table->string('ip', 20)->comment('ip地址');
			$table->string('stime', 20)->comment('发送时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_sms_log');
	}

}
