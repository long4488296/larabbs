<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAdCustomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_ad_custom', function(Blueprint $table)
		{
			$table->increments('ad_id');
			$table->boolean('ad_type')->default(1);
			$table->string('ad_name', 60)->nullable();
			$table->integer('add_time')->unsigned()->default(0);
			$table->text('content', 16777215)->nullable();
			$table->string('url')->nullable();
			$table->boolean('ad_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_ad_custom');
	}

}
