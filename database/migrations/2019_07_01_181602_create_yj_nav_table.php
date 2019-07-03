<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjNavTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_nav', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ctype', 10)->nullable();
			$table->smallInteger('cid')->unsigned()->nullable();
			$table->string('name');
			$table->boolean('ifshow')->index('ifshow');
			$table->boolean('vieworder');
			$table->boolean('opennew');
			$table->string('url');
			$table->string('type', 10)->index('type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_nav');
	}

}
