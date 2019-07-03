<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPackageGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_package_goods', function(Blueprint $table)
		{
			$table->integer('package_id')->unsigned()->default(0);
			$table->integer('goods_id')->unsigned()->default(0);
			$table->integer('product_id')->unsigned()->default(0);
			$table->smallInteger('goods_number')->unsigned()->default(1);
			$table->boolean('admin_id')->default(0);
			$table->primary(['package_id','goods_id','admin_id','product_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_package_goods');
	}

}
