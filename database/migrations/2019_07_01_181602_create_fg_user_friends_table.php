<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgUserFriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_user_friends', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('friend_id');
			$table->primary(['user_id','friend_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_user_friends');
	}

}
