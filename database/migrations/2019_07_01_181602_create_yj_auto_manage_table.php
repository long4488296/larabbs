<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAutoManageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_auto_manage', function(Blueprint $table)
		{
			$table->integer('item_id');
			$table->string('type', 10);
			$table->integer('starttime');
			$table->integer('endtime');
			$table->primary(['item_id','type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_auto_manage');
	}

}
