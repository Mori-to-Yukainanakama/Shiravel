<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_comments', function (Blueprint $table) {
            $table->increments('answer_comment_id')->unsigned();
            $table->integer('user_id')->nullable(false)->unsigned();
            $table->integer('answer_id')->nullable(false)->unsigned();
            $table->string('content', 255)->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            // 外部キー設定
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('answer_id')->references('answer_id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_comments');
    }
}
