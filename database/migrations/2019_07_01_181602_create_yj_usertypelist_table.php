<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUsertypelistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_usertypelist', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('value')->unsigned()->comment('数值');
			$table->string('type')->comment('类型名');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_usertypelist');
	}

}
