<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjRegExtendInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_reg_extend_info', function(Blueprint $table)
		{
			$table->increments('Id');
			$table->integer('user_id')->unsigned();
			$table->integer('reg_field_id')->unsigned();
			$table->text('content', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_reg_extend_info');
	}

}
