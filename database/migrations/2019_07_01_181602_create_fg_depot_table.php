<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFgDepotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fg_depot', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->dateTime('time')->nullable()->comment('仓库计费时间');
			$table->string('collect_fees', 20)->nullable()->default('0')->comment('收取仓库使用费用');
			$table->string('deduction', 20)->nullable()->default('0')->comment('扣除使用仓库费用');
			$table->text('c_1', 65535)->nullable()->comment('仓库栏位id1');
			$table->text('c_2', 65535)->nullable();
			$table->text('c_3', 65535)->nullable();
			$table->text('c_4', 65535)->nullable();
			$table->text('c_5', 65535)->nullable();
			$table->text('c_6', 65535)->nullable();
			$table->text('c_7', 65535)->nullable();
			$table->text('c_8', 65535)->nullable();
			$table->text('c_9', 65535)->nullable();
			$table->text('c_10', 65535)->nullable();
			$table->text('c_11', 65535)->nullable();
			$table->text('c_12', 65535)->nullable();
			$table->text('c_13', 65535)->nullable();
			$table->text('c_14', 65535)->nullable();
			$table->text('c_15', 65535)->nullable();
			$table->text('c_16', 65535)->nullable();
			$table->text('c_17', 65535)->nullable();
			$table->text('c_18', 65535)->nullable();
			$table->text('c_19', 65535)->nullable();
			$table->text('c_20', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fg_depot');
	}

}
