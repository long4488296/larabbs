<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods_type', function(Blueprint $table)
		{
			$table->smallInteger('cat_id', true)->unsigned();
			$table->string('cat_name', 60)->default('');
			$table->boolean('enabled')->default(1);
			$table->string('attr_group');
			$table->integer('seller_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods_type');
	}

}
