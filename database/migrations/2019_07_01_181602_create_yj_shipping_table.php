<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_shipping', function(Blueprint $table)
		{
			$table->boolean('shipping_id')->primary();
			$table->string('shipping_code', 20)->default('');
			$table->string('shipping_name', 120)->default('');
			$table->string('shipping_desc')->default('');
			$table->string('insure', 10)->default('0');
			$table->boolean('support_cod')->default(0);
			$table->boolean('enabled')->default(0);
			$table->text('shipping_print', 65535);
			$table->string('print_bg')->nullable();
			$table->text('config_lable', 65535)->nullable();
			$table->boolean('print_model')->nullable()->default(0);
			$table->boolean('shipping_order')->default(0);
			$table->string('shipping100_code', 20)->comment('快递100编码');
			$table->index(['shipping_code','enabled'], 'shipping_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_shipping');
	}

}
