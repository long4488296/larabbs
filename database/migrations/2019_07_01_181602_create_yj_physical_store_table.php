<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPhysicalStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_physical_store', function(Blueprint $table)
		{
			$table->increments('ph_id');
			$table->string('ph_name')->comment('实体店名称');
			$table->string('ph_address')->comment('实体店地址');
			$table->string('ph_phone')->comment('实体店联系方式');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_physical_store');
	}

}
