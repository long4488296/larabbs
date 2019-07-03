<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_goods', function(Blueprint $table)
		{
			$table->increments('goods_id');
			$table->smallInteger('cat_id')->unsigned()->default(0)->index('cat_id');
			$table->smallInteger('seller_cat_id')->default(0)->comment('商品对应的入驻商家分类');
			$table->string('goods_sn', 60)->default('')->index('goods_sn');
			$table->string('goods_name', 120)->default('');
			$table->string('goods_name_style', 60)->default('+');
			$table->integer('click_count')->unsigned()->default(0);
			$table->smallInteger('brand_id')->unsigned()->default(0)->index('brand_id');
			$table->string('provider_name', 100)->default('');
			$table->smallInteger('goods_number')->unsigned()->default(0)->index('goods_number');
			$table->string('goods_weight', 30)->nullable()->index('goods_weight');
			$table->decimal('market_price', 10)->unsigned()->default(0.00);
			$table->decimal('shop_price', 10)->unsigned()->default(0.00);
			$table->decimal('buying_price', 10)->default(0.00)->comment('进价');
			$table->decimal('promote_price', 10)->unsigned()->default(0.00);
			$table->integer('promote_start_date')->unsigned()->default(0)->index('promote_start_date');
			$table->integer('promote_end_date')->unsigned()->default(0)->index('promote_end_date');
			$table->boolean('warn_number')->default(1);
			$table->string('keywords')->default('');
			$table->string('goods_brief')->default('');
			$table->text('goods_desc', 65535);
			$table->string('goods_thumb')->default('');
			$table->string('goods_img')->default('');
			$table->string('original_img')->default('');
			$table->boolean('is_real')->default(1);
			$table->string('extension_code', 30)->default('');
			$table->boolean('is_on_sale')->default(1);
			$table->boolean('is_alone_sale')->default(1);
			$table->boolean('is_shipping')->default(0);
			$table->integer('integral')->unsigned()->default(0);
			$table->integer('add_time')->unsigned()->default(0);
			$table->smallInteger('sort_order')->unsigned()->default(100)->index('sort_order');
			$table->boolean('is_delete')->default(0);
			$table->boolean('is_best')->default(0);
			$table->boolean('is_new')->default(0);
			$table->boolean('is_hot')->default(0);
			$table->boolean('is_ys')->default(0)->comment('预售');
			$table->boolean('is_promote')->default(0);
			$table->boolean('bonus_type_id')->default(0);
			$table->boolean('voucher_type_id')->default(0)->comment('购买该商品所能领取优惠券的类型');
			$table->integer('last_update')->unsigned()->default(0)->index('last_update');
			$table->smallInteger('goods_type')->unsigned()->default(0);
			$table->string('seller_note')->default('');
			$table->integer('give_integral')->default(-1);
			$table->integer('rank_integral')->default(-1);
			$table->smallInteger('suppliers_id')->unsigned()->nullable();
			$table->boolean('is_check')->nullable();
			$table->boolean('check_status')->default(0);
			$table->string('check_cause');
			$table->string('check_user', 100);
			$table->integer('seller_id')->default(0);
			$table->text('packing_list', 65535);
			$table->boolean('is_display')->default(0);
			$table->integer('sales_volume')->default(0);
			$table->text('m_goods_desc', 65535)->comment('手机端商品详情');
			$table->string('m_goods_img')->comment('手机端商品图片');
			$table->string('m_goods_thumb')->comment('手机商品缩略图');
			$table->string('m_original_img')->comment('手机原图片');
			$table->integer('shipping_id')->default(10)->comment('商品独立配送id');
			$table->integer('video_id')->nullable()->comment('商品视频id');
			$table->string('origin', 50)->nullable()->comment('产地');
			$table->string('suttle', 50)->nullable()->comment('净重');
			$table->string('conditions', 50)->nullable()->comment('储存条件');
			$table->string('shelflife', 50)->nullable()->comment('保质期');
			$table->string('safety', 50)->nullable()->comment('安全认证');
			$table->string('ys_msg')->nullable()->comment('预售信息');
			$table->integer('is_limit')->default(0)->comment('限购，对应限购规则id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_goods');
	}

}
