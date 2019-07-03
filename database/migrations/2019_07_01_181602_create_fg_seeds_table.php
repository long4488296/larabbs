<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgSeedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_seeds', function(Blueprint $table)
		{
			$table->increments('seed_id')->comment('种子id');
			$table->string('seed_name', 100)->comment('种子名称');
			$table->decimal('price', 10, 0)->nullable();
			$table->string('seed_type', 50)->nullable()->comment('种子类型');
			$table->integer('count')->nullable()->comment('种子数量');
			$table->integer('sum')->nullable()->comment('种子碎片最大保护数');
			$table->enum('is_protect', array('0','1'))->comment('是否保护 1保护0不保护');
			$table->integer('steal_max')->nullable()->comment('可偷取最大份数');
			$table->enum('garde', array('4','3','2','1'))->comment('种子等级 四个等级');
			$table->string('plant_time', 20)->nullable()->comment('种子生长期');
			$table->string('growup_time', 20)->nullable()->comment('成长期');
			$table->string('mature_time', 20)->nullable()->comment('成熟期');
			$table->string('pick_time', 20)->nullable()->comment('采摘时间');
			$table->integer('goods_id')->nullable()->comment('实际商品对应id');
			$table->string('introduct')->nullable()->comment('种子简介');
			$table->enum('type', array('0','2','1'))->nullable()->default('1')->comment('商品类型 1种子 0道具 2批团奖励');
			$table->text('images', 65535)->nullable()->comment('种子完全成熟图片');
			$table->string('is_gratis', 5)->nullable()->comment('是否免费种子 0不免费 1免费');
			$table->string('two_copies')->nullable()->comment('北京地区商品，种一得二');
			$table->text('growup_img', 65535)->nullable()->comment('生长图片');
			$table->text('mature_img', 65535)->nullable()->comment('成熟图片');
			$table->text('pick_img', 65535)->nullable()->comment('采摘图片');
			$table->text('ku_img', 65535)->nullable();
			$table->string('is_shelf')->nullable()->default('1')->comment('是否上架 0 否 1是');
			$table->integer('reward_id')->nullable()->comment('奖励id');
			$table->integer('is_pt')->nullable()->default(0)->comment('是否是拼团商品0不是1是');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_seeds');
	}

}
