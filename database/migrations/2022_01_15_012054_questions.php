<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id')->unsigned();
            $table->integer('user_id')->nullable(false)->unsigned();
            $table->string('title', 255)->nullable(false);
            $table->text('content')->nullable(false);
            $table->boolean('is_answered')->default(false);
            $table->boolean('is_solved')->default(false);
            $table->timestamps();
            $table->softDeletes();

            // 外部キー設定
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
