<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_role', function(Blueprint $table)
		{
			$table->smallInteger('role_id', true)->unsigned();
			$table->string('role_name', 60)->default('')->index('user_name');
			$table->text('action_list', 65535);
			$table->text('role_describe', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_role');
	}

}
