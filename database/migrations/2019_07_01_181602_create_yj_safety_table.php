<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSafetyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_safety', function(Blueprint $table)
		{
			$table->increments('s_id')->comment('安全认证id');
			$table->string('s_name', 20)->comment('安全认证名');
			$table->string('s_img', 100)->comment('安全认证图片');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_safety');
	}

}
