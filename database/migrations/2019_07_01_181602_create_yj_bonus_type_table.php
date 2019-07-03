<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjBonusTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_bonus_type', function(Blueprint $table)
		{
			$table->smallInteger('type_id', true)->unsigned();
			$table->string('type_name', 60)->default('');
			$table->decimal('type_money', 10)->default(0.00);
			$table->boolean('send_type')->default(0);
			$table->decimal('min_amount', 10)->unsigned()->default(0.00);
			$table->decimal('max_amount', 10)->unsigned()->default(0.00);
			$table->integer('send_start_date')->default(0);
			$table->integer('send_end_date')->default(0);
			$table->integer('use_start_date')->default(0);
			$table->integer('use_end_date')->default(0);
			$table->decimal('min_goods_amount', 10)->unsigned()->default(0.00);
			$table->integer('cat_id')->unsigned()->default(0)->comment('对应分类id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_bonus_type');
	}

}
