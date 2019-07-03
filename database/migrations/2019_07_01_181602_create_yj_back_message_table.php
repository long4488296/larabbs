<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjBackMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_back_message', function(Blueprint $table)
		{
			$table->bigInteger('m_id', true);
			$table->string('message', 500)->nullable();
			$table->string('add_time')->nullable();
			$table->string('back_sn')->nullable();
			$table->integer('is_admin')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_back_message');
	}

}
