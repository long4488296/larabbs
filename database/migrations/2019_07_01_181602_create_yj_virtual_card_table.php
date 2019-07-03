<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVirtualCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_virtual_card', function(Blueprint $table)
		{
			$table->integer('card_id', true);
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->string('card_sn', 60)->default('')->index('car_sn');
			$table->string('card_password', 60)->default('');
			$table->integer('add_date')->default(0);
			$table->integer('end_date')->default(0);
			$table->boolean('is_saled')->default(0)->index('is_saled');
			$table->string('order_sn', 20)->default('');
			$table->string('crc32', 12)->default('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_virtual_card');
	}

}
