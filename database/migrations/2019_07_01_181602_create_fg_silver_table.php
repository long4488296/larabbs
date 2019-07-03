<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgSilverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_silver', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable()->comment('用户id');
			$table->integer('silver_count')->nullable()->default(0)->comment('用户金贝数量');
			$table->integer('yb_count')->nullable()->default(0)->comment('用户银贝数量');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_silver');
	}

}
