<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjOrderBackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_order_back', function(Blueprint $table)
		{
			$table->string('back_sn')->nullable();
			$table->string('invoice_no')->nullable();
			$table->string('order_sn')->nullable();
			$table->integer('user_id')->nullable();
			$table->string('case', 20)->nullable();
			$table->string('shipping_name', 125)->nullable();
			$table->string('goods', 500)->nullable();
			$table->decimal('subtotal', 10)->nullable();
			$table->string('liyou')->nullable();
			$table->string('beizhu', 500)->nullable();
			$table->string('add_time')->nullable();
			$table->string('receve', 500)->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->string('back_pic1')->nullable();
			$table->string('back_pic2')->nullable();
			$table->string('back_pic3')->nullable();
			$table->string('number', 100);
			$table->integer('seller_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_order_back');
	}

}
