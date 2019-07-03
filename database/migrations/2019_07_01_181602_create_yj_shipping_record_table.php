<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjShippingRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_shipping_record', function(Blueprint $table)
		{
			$table->increments('id')->comment('物流轨迹id');
			$table->integer('ad_time')->unsigned()->comment('添加记录时间');
			$table->integer('order_id')->unsigned()->comment('关联订单');
			$table->text('content', 65535)->comment('内容');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_shipping_record');
	}

}
