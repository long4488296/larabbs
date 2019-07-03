<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgCreateGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_create_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('group_name', 100)->comment('群名称');
			$table->text('group_img', 65535)->comment('群头像');
			$table->string('group_type', 150)->nullable()->comment('群分类');
			$table->string('ID_info_z')->nullable()->comment('身份证号正面');
			$table->string('ID_info_f')->nullable()->comment('身份证号反面');
			$table->string('assess01')->nullable()->comment('产品资质评测图片');
			$table->string('other_assess01')->nullable()->comment('其他资质图片');
			$table->integer('status')->nullable()->default(2)->comment('审核状态0未通过1通过2审核中');
			$table->dateTime('time')->nullable()->comment('申请时间');
			$table->string('assess02')->nullable();
			$table->string('assess03')->nullable();
			$table->string('assess04')->nullable();
			$table->string('other_assess02')->nullable();
			$table->string('other_assess03')->nullable();
			$table->string('other_assess04')->nullable();
			$table->string('group_desc', 150)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_create_group');
	}

}
