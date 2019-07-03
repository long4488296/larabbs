<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAttributeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_attribute', function(Blueprint $table)
		{
			$table->smallInteger('attr_id', true)->unsigned();
			$table->smallInteger('cat_id')->unsigned()->default(0)->index('cat_id');
			$table->string('attr_name', 60)->default('');
			$table->boolean('attr_input_type')->default(1);
			$table->boolean('attr_type')->default(1);
			$table->text('attr_values', 65535);
			$table->boolean('attr_index')->default(0);
			$table->boolean('sort_order')->default(0);
			$table->boolean('is_linked')->default(0);
			$table->boolean('attr_group')->default(0);
			$table->integer('seller_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_attribute');
	}

}
