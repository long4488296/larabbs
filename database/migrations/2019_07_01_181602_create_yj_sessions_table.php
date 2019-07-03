<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_sessions', function(Blueprint $table)
		{
			$table->char('sesskey', 32)->default('')->primary();
			$table->integer('expiry')->unsigned()->default(0)->index('expiry');
			$table->integer('userid')->unsigned()->default(0);
			$table->integer('adminid')->unsigned()->default(0);
			$table->char('ip', 15)->default('');
			$table->string('user_name', 60);
			$table->boolean('user_rank');
			$table->decimal('discount', 3);
			$table->string('email', 60);
			$table->char('data')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_sessions');
	}

}
