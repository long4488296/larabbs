<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUserAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_user_account', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->string('admin_user');
			$table->decimal('amount', 10);
			$table->integer('add_time')->default(0);
			$table->integer('paid_time')->default(0);
			$table->string('admin_note');
			$table->string('user_note');
			$table->boolean('process_type')->default(0);
			$table->string('payment', 90);
			$table->boolean('is_paid')->default(0)->index('is_paid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_user_account');
	}

}
