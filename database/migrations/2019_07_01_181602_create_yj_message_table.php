<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_message', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('type_id');
			$table->string('message_content');
			$table->dateTime('add_time');
			$table->integer('statr');
			$table->integer('user_id');
			$table->string('order_sn');
			$table->boolean('read_unread')->nullable()->default(1)->comment('消息状态1未读 2已读');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_message');
	}

}
