<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjSellerShopheaderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_seller_shopheader', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('content', 65535);
			$table->string('seller_theme', 100);
			$table->integer('seller_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_seller_shopheader');
	}

}
