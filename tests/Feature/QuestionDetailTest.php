<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class QuestionDetailTest extends TestCase
{

    // 質問詳細取得パス
    private const QUESTION_DETAIL_GET_PATH = 'api/v1/questions/detail?question_id=';

    /**
     * 質問詳細取得レスポンスチェック
     * 200レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function questionDetailResponse200Check($questionId)
    {
        $response = $this->get($this::QUESTION_DETAIL_GET_PATH . $questionId);
        $response->assertStatus(200);
    }

    /**
     * 質問詳細取得レスポンスチェック
     * 404レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function questionDetailResponse404Check($questionId)
    {
        $response = $this->get($this::QUESTION_DETAIL_GET_PATH . $questionId);
        $response->assertStatus(404);
    }

    /**
     * 質問詳細取得
     * 成功パターン
     *
     * @test
     * @return void
     */
    public function getQuestionDetailTest()
    {
        $questionId = 5;
        $this->questionDetailResponse200Check($questionId);
    }

    /**
     * 質問詳細取得
     * 失敗パターン
     * question_id 全角文字
     *
     * @test
     * @return void
     */
    public function getQuestionDetailFullWidthCharacterErrorTest()
    {
        $questionId = 'あ';
        $this->questionDetailResponse404Check($questionId);
    }

    /**
     * 質問詳細取得
     * 失敗パターン
     * question_id 半角文字
     *
     * @test
     * @return void
     */
    public function getQuestionDetailHalfSizeCharacterErrorTest()
    {
        $questionId = 'a';
        $this->questionDetailResponse404Check($questionId);
    }

    /**
     * 質問詳細取得
     * 失敗パターン
     * question_id 記号
     *
     * @test
     * @return void
     */
    public function getQuestionDetailSymbolErrorTest()
    {
        $questionId = '@';
        $this->questionDetailResponse404Check($questionId);
    }
}
