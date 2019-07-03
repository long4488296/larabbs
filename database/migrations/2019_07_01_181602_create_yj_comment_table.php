<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYjCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yj_comment', function(Blueprint $table)
		{
			$table->increments('comment_id');
			$table->boolean('comment_type')->default(0);
			$table->integer('id_value')->unsigned()->default(0)->index('id_value');
			$table->string('email', 60)->default('');
			$table->string('user_name', 60)->default('');
			$table->text('content', 65535);
			$table->integer('comment_rank')->unsigned()->default(5);
			$table->integer('add_time')->unsigned()->default(0);
			$table->string('ip_address', 15)->default('');
			$table->boolean('status')->default(0);
			$table->integer('parent_id')->unsigned()->default(0)->index('parent_id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->integer('seller_id')->default(0);
			$table->string('photo1')->default('');
			$table->string('photo2')->default('');
			$table->string('photo3')->default('');
			$table->string('photo4')->default('');
			$table->string('photo5')->default('');
			$table->string('photo1_thumb')->default('');
			$table->string('photo2_thumb')->default('');
			$table->string('photo3_thumb')->default('');
			$table->string('photo4_thumb')->default('');
			$table->string('photo5_thumb')->default('');
			$table->integer('order_id')->unsigned()->default(0);
			$table->integer('comment_rank_w')->default(5)->comment('物流评价');
			$table->integer('comment_rank_f')->default(5)->comment('客服评价');
			$table->string('imgs')->comment('评价时上传的图片');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yj_comment');
	}

}
