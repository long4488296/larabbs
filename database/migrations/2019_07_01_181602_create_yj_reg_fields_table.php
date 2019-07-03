<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjRegFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_reg_fields', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('reg_field_name', 60);
			$table->boolean('dis_order')->default(100);
			$table->boolean('display')->default(1);
			$table->boolean('type')->default(0);
			$table->boolean('is_need')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_reg_fields');
	}

}
