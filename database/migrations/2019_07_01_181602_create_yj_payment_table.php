<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_payment', function(Blueprint $table)
		{
			$table->boolean('pay_id')->primary();
			$table->string('pay_code', 20)->default('')->unique('pay_code');
			$table->string('pay_name', 120)->default('');
			$table->string('pay_fee', 10)->default('0');
			$table->text('pay_desc', 65535);
			$table->boolean('pay_order')->default(0);
			$table->text('pay_config', 65535);
			$table->boolean('enabled')->default(0);
			$table->boolean('is_cod')->default(0);
			$table->boolean('is_online')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_payment');
	}

}
