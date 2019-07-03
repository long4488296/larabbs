<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgWxReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_wx_reply', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('key', 150)->nullable()->comment('用户输入的内容');
			$table->text('content', 65535)->nullable()->comment('回复的内容');
			$table->integer('type')->nullable()->comment('类型1自动回复 2 关注回复 3扫码回复');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_wx_reply');
	}

}
