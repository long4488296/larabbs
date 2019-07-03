<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgBagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_bag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->comment('商品名称');
			$table->integer('user_id');
			$table->integer('num')->comment('商品数量');
			$table->decimal('Unit_Price', 2, 0)->comment('物品单价');
			$table->decimal('Total_Price', 10, 0)->nullable()->comment('物品总价');
			$table->enum('type', array('0','1'))->nullable()->comment('物品类型 1种子0道具');
			$table->string('time', 50)->nullable()->comment('物品有效期');
			$table->integer('seed_id')->nullable()->comment('种子id');
			$table->integer('prop_id')->nullable()->comment('道具id');
			$table->dateTime('buy_time')->nullable()->comment('购买时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_bag');
	}

}
