<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjMemberPriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_member_price', function(Blueprint $table)
		{
			$table->increments('price_id');
			$table->integer('goods_id')->unsigned()->default(0);
			$table->boolean('user_rank')->default(0);
			$table->decimal('user_price', 10)->default(0.00);
			$table->index(['goods_id','user_rank'], 'goods_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_member_price');
	}

}
