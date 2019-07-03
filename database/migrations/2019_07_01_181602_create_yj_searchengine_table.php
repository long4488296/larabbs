<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSearchengineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_searchengine', function(Blueprint $table)
		{
			$table->date('date')->default('0000-00-00');
			$table->string('searchengine', 20)->default('');
			$table->integer('count')->unsigned()->default(0);
			$table->primary(['date','searchengine']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_searchengine');
	}

}
