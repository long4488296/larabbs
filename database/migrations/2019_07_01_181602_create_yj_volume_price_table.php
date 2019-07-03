<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjVolumePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_volume_price', function(Blueprint $table)
		{
			$table->boolean('price_type');
			$table->integer('goods_id')->unsigned();
			$table->smallInteger('volume_number')->unsigned()->default(0);
			$table->decimal('volume_price', 10)->default(0.00);
			$table->primary(['price_type','goods_id','volume_number']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_volume_price');
	}

}
