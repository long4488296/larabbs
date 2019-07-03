<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjAdsenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_adsense', function(Blueprint $table)
		{
			$table->smallInteger('from_ad')->default(0)->index('from_ad');
			$table->string('referer')->default('');
			$table->integer('clicks')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_adsense');
	}

}
