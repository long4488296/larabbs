<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAffiliateLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_affiliate_log', function(Blueprint $table)
		{
			$table->integer('log_id', true);
			$table->integer('order_id');
			$table->integer('time');
			$table->integer('user_id');
			$table->string('user_name', 60)->nullable();
			$table->decimal('money', 10)->default(0.00);
			$table->integer('point')->default(0);
			$table->boolean('separate_type')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_affiliate_log');
	}

}
