<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_card', function(Blueprint $table)
		{
			$table->boolean('card_id')->primary();
			$table->string('card_name', 120)->default('');
			$table->string('card_img')->default('');
			$table->decimal('card_fee', 6)->unsigned()->default(0.00);
			$table->decimal('free_money', 6)->unsigned()->default(0.00);
			$table->string('card_desc')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_card');
	}

}
