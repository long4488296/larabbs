<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjShowindexgoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_showindexgoods', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('goods_id');
			$table->boolean('isshow')->default(1);
			$table->dateTime('inputtime');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_showindexgoods');
	}

}
