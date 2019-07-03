<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgLandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_land', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->text('dog', 65535)->nullable();
			$table->text('watering', 65535)->nullable()->comment('浇水');
			$table->text('energy', 65535)->nullable();
			$table->text('sp_1', 65535)->nullable()->comment('第一块地id');
			$table->text('sp_2', 65535)->nullable();
			$table->text('sp_3', 65535)->nullable();
			$table->text('sp_4', 65535)->nullable();
			$table->text('sp_5', 65535)->nullable();
			$table->text('sp_6', 65535)->nullable();
			$table->text('sp_7', 65535)->nullable();
			$table->text('sp_8', 65535)->nullable();
			$table->text('sp_9', 65535)->nullable();
			$table->text('sp_10', 65535)->nullable();
			$table->text('sp_11', 65535)->nullable();
			$table->text('sp_12', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_land');
	}

}
