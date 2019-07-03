<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->string('email', 60)->nullable()->default('')->index('email');
			$table->string('openid')->nullable()->comment('第三方登录id');
			$table->string('user_name', 60)->default('')->unique('user_name');
			$table->string('realname', 10)->comment('真名');
			$table->string('password', 32)->nullable()->default('');
			$table->string('userimg')->nullable()->default('')->comment('用户头像');
			$table->string('qrcode')->nullable()->comment('二维码');
			$table->string('qrcodes')->nullable()->comment('二维码');
			$table->string('question')->default('');
			$table->string('answer')->default('');
			$table->integer('sex')->unsigned()->default(0);
			$table->date('birthday')->default('0000-00-00');
			$table->decimal('user_money', 10)->default(0.00);
			$table->decimal('real_money', 10)->default(0.00)->comment('实冲资金总数');
			$table->decimal('gift_money', 10)->default(0.00)->comment('充值赠送总资金');
			$table->decimal('frozen_money', 10)->default(0.00);
			$table->integer('pay_points')->unsigned()->default(0);
			$table->integer('rank_points')->unsigned()->default(0);
			$table->integer('address_id')->unsigned()->default(0);
			$table->integer('reg_time')->unsigned()->default(0);
			$table->integer('last_login')->unsigned()->default(0);
			$table->dateTime('last_time')->default('0000-00-00 00:00:00');
			$table->string('last_ip', 15)->default('');
			$table->smallInteger('visit_count')->unsigned()->default(0);
			$table->boolean('user_rank')->default(0);
			$table->boolean('is_special')->default(0);
			$table->string('ec_salt', 10)->nullable();
			$table->string('salt', 10)->default('0');
			$table->integer('parent_id')->default(0)->index('parent_id');
			$table->boolean('flag')->default(0)->index('flag');
			$table->string('alias', 60);
			$table->string('msn', 60);
			$table->string('qq', 20);
			$table->string('office_phone', 20);
			$table->string('home_phone', 20);
			$table->string('mobile_phone', 20);
			$table->boolean('is_validated')->default(0);
			$table->decimal('credit_line', 10)->unsigned();
			$table->string('passwd_question', 50)->nullable();
			$table->string('passwd_answer')->nullable();
			$table->boolean('utype')->default(1)->index('utype')->comment('用户类型yj');
			$table->integer('addid')->unsigned()->default(0)->index('addid')->comment('添加者id');
			$table->boolean('activation')->default(0)->index('activation')->comment('激活');
			$table->string('paypassword', 32)->nullable()->default('');
			$table->decimal('beginning_money', 10)->default(0.00)->comment('初始资金');
			$table->boolean('expense')->nullable()->default(0)->comment('消费会员');
			$table->integer('promoters_id')->unsigned()->default(0)->comment('推广id');
			$table->float('discount', 10, 0)->nullable()->default(1)->comment('折扣');
			$table->float('lifetime_discount', 10, 0)->nullable()->default(1)->comment('终身折扣');
			$table->integer('activity')->nullable()->default(0)->comment('活跃度');
			$table->integer('activity_time')->nullable()->default(0)->comment('活跃度扣除时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_users');
	}

}
