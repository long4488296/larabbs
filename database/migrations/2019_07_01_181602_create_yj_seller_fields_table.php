<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_fields', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('reg_field_name', 60);
			$table->boolean('dis_order')->default(100);
			$table->boolean('display')->default(1);
			$table->string('type', 20)->comment('表单类型');
			$table->boolean('is_need')->default(1);
			$table->text('select_options', 65535);
			$table->integer('width');
			$table->integer('height');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_fields');
	}

}
