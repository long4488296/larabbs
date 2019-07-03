<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_keywords', function(Blueprint $table)
		{
			$table->date('date')->default('0000-00-00');
			$table->string('searchengine', 20)->default('');
			$table->string('keyword', 90)->default('');
			$table->integer('count')->unsigned()->default(0);
			$table->primary(['date','searchengine','keyword']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_keywords');
	}

}
