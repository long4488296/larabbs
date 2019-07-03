<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgPropTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_prop', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->decimal('price', 10, 0)->nullable()->comment('道具价格');
			$table->string('use_time', 20)->nullable()->comment('可使用时间 单位时');
			$table->string('content')->nullable()->comment('道具介绍');
			$table->enum('type', array('0'))->nullable()->default('0')->comment('商品类型 0道具 1种子');
			$table->string('images')->nullable()->comment('道具图片');
			$table->integer('count')->nullable()->comment('水壶使用次数');
			$table->integer('re_time')->nullable()->comment('使用水壶减少时间 单位秒');
			$table->integer('is_part')->nullable()->comment('作用域 0 全部 1 局部');
			$table->string('is_shelf')->nullable()->default('1')->comment('是否上架0否1是');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_prop');
	}

}
