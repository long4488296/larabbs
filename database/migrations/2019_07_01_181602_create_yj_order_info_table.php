<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjOrderInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_order_info', function(Blueprint $table)
		{
			$table->increments('order_id');
			$table->integer('parent_order_id')->default(0);
			$table->string('order_sn', 21)->default('')->unique('order_sn');
			$table->integer('user_id')->unsigned()->default(0)->index('user_id');
			$table->integer('order_status')->unsigned()->default(0)->index('order_status');
			$table->integer('shipping_status')->unsigned()->default(0)->index('shipping_status');
			$table->integer('pay_status')->unsigned()->default(0)->index('pay_status');
			$table->string('consignee', 60)->default('');
			$table->smallInteger('country')->unsigned()->default(0);
			$table->smallInteger('province')->unsigned()->default(0);
			$table->smallInteger('city')->unsigned()->default(0);
			$table->smallInteger('district')->unsigned()->default(0);
			$table->string('address')->default('');
			$table->string('order_address', 60)->comment('订单地址与省份合并');
			$table->string('zipcode', 60)->default('');
			$table->string('tel', 60)->default('');
			$table->string('mobile', 60)->default('');
			$table->string('email', 60)->default('');
			$table->string('best_time', 120)->default('');
			$table->string('sign_building', 120)->default('');
			$table->string('postscript')->default('');
			$table->boolean('shipping_id')->default(10)->index('shipping_id');
			$table->string('shipping_name', 120)->default('');
			$table->boolean('pay_id')->default(0)->index('pay_id');
			$table->string('pay_name', 120)->default('');
			$table->string('how_oos', 120)->default('');
			$table->string('how_surplus', 120)->default('');
			$table->string('pack_name', 120)->default('');
			$table->string('card_name', 120)->default('');
			$table->string('card_message')->default('');
			$table->string('inv_payee', 120)->default('');
			$table->string('inv_content', 120)->default('');
			$table->decimal('goods_amount', 10)->default(0.00);
			$table->decimal('shipping_fee', 10)->default(0.00);
			$table->decimal('insure_fee', 10)->default(0.00);
			$table->decimal('pay_fee', 10)->default(0.00);
			$table->decimal('pack_fee', 10)->default(0.00);
			$table->decimal('card_fee', 10)->default(0.00);
			$table->decimal('money_paid', 10)->default(0.00);
			$table->decimal('surplus', 10)->default(0.00);
			$table->integer('integral')->unsigned()->default(0);
			$table->decimal('integral_money', 10)->default(0.00);
			$table->decimal('bonus', 10)->default(0.00);
			$table->decimal('voucher', 10)->default(0.00)->comment('使用优惠券金额');
			$table->decimal('order_amount', 10)->default(0.00);
			$table->smallInteger('from_ad')->default(0);
			$table->string('referer')->default('');
			$table->integer('add_time')->unsigned()->default(0);
			$table->integer('confirm_time')->unsigned()->default(0);
			$table->integer('pay_time')->unsigned()->default(0);
			$table->integer('shipping_time')->unsigned()->default(0);
			$table->boolean('pack_id')->default(0);
			$table->boolean('card_id')->default(0);
			$table->integer('bonus_id')->unsigned()->default(0);
			$table->integer('voucher_id')->unsigned()->default(0)->comment('使用的优惠券id');
			$table->string('invoice_no')->default('');
			$table->string('extension_code', 30)->default('');
			$table->integer('extension_id')->unsigned()->default(0);
			$table->string('to_buyer')->default('');
			$table->string('pay_note')->default('');
			$table->smallInteger('agency_id')->unsigned()->index('agency_id');
			$table->string('inv_type', 60);
			$table->decimal('tax', 10);
			$table->boolean('is_separate')->default(0);
			$table->integer('parent_id')->unsigned()->default(0);
			$table->decimal('discount', 10);
			$table->integer('seller_id')->default(0)->comment('入驻商家ID');
			$table->integer('is_comment')->default(0);
			$table->boolean('isfoder')->default(0)->comment('首单');
			$table->integer('statr')->nullable()->default(1)->comment('订单是否正常 1:正常，2:作废');
			$table->string('collectgoods_time')->nullable()->comment('订单收货时间');
			$table->integer('is_ph')->nullable()->default(0)->comment('订单是否自提 0:否，1:是');
			$table->string('is_ph_id')->nullable()->comment('订单自提实体店id');
			$table->index(['extension_code','extension_id'], 'extension_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_order_info');
	}

}
