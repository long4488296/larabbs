<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjPackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_pack', function(Blueprint $table)
		{
			$table->boolean('pack_id')->primary();
			$table->string('pack_name', 120)->default('');
			$table->string('pack_img')->default('');
			$table->decimal('pack_fee', 6)->unsigned()->default(0.00);
			$table->smallInteger('free_money')->unsigned()->default(0);
			$table->string('pack_desc')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_pack');
	}

}
