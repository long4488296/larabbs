<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjEmailSendlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_email_sendlist', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 100);
			$table->integer('template_id');
			$table->text('email_content', 65535);
			$table->boolean('error')->default(0);
			$table->boolean('pri');
			$table->integer('last_send');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_email_sendlist');
	}

}
