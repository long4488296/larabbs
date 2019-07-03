<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('group_name', 150)->nullable()->comment('群昵称');
			$table->string('group_image')->nullable()->comment('群头像 ');
			$table->string('group_uuid', 100)->nullable()->comment('群邀请码');
			$table->integer('group_owner_id')->nullable()->comment('群主ID ');
			$table->integer('group_num')->nullable()->comment('群总人数');
			$table->text('group_list', 65535)->nullable()->comment('群员列表');
			$table->integer('current_num')->nullable()->comment('当前人数');
			$table->string('group_desc')->nullable()->comment('群介绍');
			$table->string('qr_img')->nullable()->comment('二维码');
			$table->string('qr_time')->nullable()->comment('二维码生成时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_group');
	}

}
