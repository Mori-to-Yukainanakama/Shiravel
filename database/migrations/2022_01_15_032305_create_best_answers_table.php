<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('best_answers', function (Blueprint $table) {
            $table->increments('best_answer_id')->unsigned();
            $table->integer('question_id')->nullable(false)->unsigned();
            $table->integer('answer_id')->nullable()->unsigned();
            $table->integer('question_comment_id')->nullable()->unsigned();
            $table->integer('answer_comment_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            // 外部キー設定
            $table->foreign('question_id')->references('question_id')->on('questions');
            $table->foreign('answer_id')->references('answer_id')->on('answers');
            $table->foreign('question_comment_id')->references('question_comment_id')->on('question_comments');
            $table->foreign('answer_comment_id')->references('answer_comment_id')->on('answer_comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('best_answers');
    }
}
