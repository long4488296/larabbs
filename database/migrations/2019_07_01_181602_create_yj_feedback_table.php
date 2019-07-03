<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_feedback', function(Blueprint $table)
		{
			$table->increments('msg_id');
			$table->integer('parent_id')->unsigned()->default(0);
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->string('user_name', 60)->default('');
			$table->string('user_email', 60)->default('');
			$table->string('msg_title', 200)->default('');
			$table->boolean('msg_type')->default(0);
			$table->boolean('msg_status')->default(0);
			$table->text('msg_content', 65535);
			$table->integer('msg_time')->unsigned()->default(0);
			$table->string('message_img')->default('0');
			$table->integer('order_id')->unsigned()->default(0);
			$table->boolean('msg_area')->default(0);
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
		Schema::drop('yj_feedback');
	}

}
