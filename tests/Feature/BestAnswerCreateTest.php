<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BestAnswerCreateTest extends TestCase
{

    private const BESTANSWER_CREATE_PATH = 'api/v1/bestAnswer/';


    /**
     * ベストアンサー登録レスポンスチェック
     * 200レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function bestAnswerCreateResponse200Check($testData)
    {
        $response = $this->post($this::BESTANSWER_CREATE_PATH, $testData);
        $response->assertStatus(200);
    }

    /**
     * 質問登録レスポンスチェック
     * 422レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function bestAnswerCreateResponse422Check($testData)
    {
        $response = $this->post($this::BESTANSWER_CREATE_PATH, $testData);
        $response->assertStatus(422);
    }

    /**
     * ベストアンサー登録
     * 成功パターン
     * 回答IDでの登録パターン
     *
     * @test
     * @return void
     */
    public function answerBestAnswerCreateTest()
    {
        $testData = [
            'question_id' => 15,
            'answer_id' => 1,
            'answer_comment_id' => null,
            'question_comment_id' => null,
        ];

        $this->bestAnswerCreateResponse200Check($testData);
    }

    /**
     * ベストアンサー登録
     * 成功パターン
     * 回答コメントIDでの登録パターン
     *
     * @test
     * @return void
     */
    public function answerCommentBestAnswerCreateTest()
    {
        $testData = [
            'question_id' => 16,
            'answer_id' => null,
            'answer_comment_id' => 1,
            'question_comment_id' => null,
        ];

        $this->bestAnswerCreateResponse200Check($testData);
    }

    /**
     * ベストアンサー登録
     * 成功パターン
     * 質問コメントIDでの登録パターン
     *
     * @test
     * @return void
     */
    public function questionCommentBestAnswerCreateTest()
    {
        $testData = [
            'question_id' => 17,
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponse200Check($testData);
    }
}
