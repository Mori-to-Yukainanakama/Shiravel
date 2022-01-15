<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_comments', function (Blueprint $table) {
            $table->increments('question_comment_id')->unsigned();
            $table->integer('user_id')->nullable(false)->unsigned();
            $table->integer('question_id')->nullable(false)->unsigned();
            $table->string('content', 255)->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            // 外部キー設定
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('question_id')->references('question_id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_comments');
    }
}
