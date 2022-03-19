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

    public function bestAnswerCreateResponseErrorJsonCheck($testData)
    {
        // BestAnswerCreateCheckMiddlewareで、エラーだった場合に返却されるJSONの値
        $responseJson = ['message' => '対象のidのセットが適切ではありません。'];

        $response = $this->post($this::BESTANSWER_CREATE_PATH, $testData);
        $response->assertJson($responseJson, true);
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

    /**
     * ベストアンサー登録
     * 失敗パターン
     * すでにベストアンサーが決まっている質問に対しての登録処理
     *
     * @test
     * @return void
     */
    public function alreadyAnswerBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 15,
            'answer_id' => 1,
            'answer_comment_id' => null,
            'question_comment_id' => null,
        ];

        // BestAnswerCreateCheckMiddlewareで、エラーだった場合に返却されるJSONの値
        $responseJson = ['message' => 'この質問のベストアンサーはすでに決まっています。'];

        $response = $this->post($this::BESTANSWER_CREATE_PATH, $testData);
        $response->assertJson($responseJson, true);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_id 半角文字
     *
     * @test
     * @return void
     */
    public function questionIdHalfSizeCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 'a',
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponse422Check($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_id 全角文字
     *
     * @test
     * @return void
     */
    public function questionIdFullWidthCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 'あ',
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponse422Check($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_id 　記号
     *
     * @test
     * @return void
     */
    public function questionIdSymbolBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => '@',
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponse422Check($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_id 半角文字
     *
     * @test
     * @return void
     */
    public function answerIdHalfSizeCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 'a',
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_id 全角文字
     *
     * @test
     * @return void
     */
    public function answerIdFullWidthCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 'あ',
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_id 記号
     *
     * @test
     * @return void
     */
    public function answerIdSymbolBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => '+',
            'answer_comment_id' => null,
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_comment_id 半角文字
     *
     * @test
     * @return void
     */
    public function answerCommentIdHalfSizeCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => 'a',
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_comment_id 全角文字
     *
     * @test
     * @return void
     */
    public function answerCommentIdFullWidthCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => 'あ',
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * answer_comment_id 記号
     *
     * @test
     * @return void
     */
    public function answerCommentIdSymbolBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => ';',
            'question_comment_id' => 1,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_comment_id 半角文字
     *
     * @test
     * @return void
     */
    public function questionCommentIdHalfSizeCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => null,
            'question_comment_id' => 'a',
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_comment_id 全角文字
     *
     * @test
     * @return void
     */
    public function questionCommentIdFullWidthCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => null,
            'question_comment_id' => 'あ',
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_comment_id 記号
     *
     * @test
     * @return void
     */
    public function questionCommentIdSymbolBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 27,
            'answer_id' => 1,
            'answer_comment_id' => null,
            'question_comment_id' => '(',
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * 全部null
     *
     * @test
     * @return void
     */
    public function allNullBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => null,
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => null,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_id以外 null
     *
     * @test
     * @return void
     */
    public function questionIdOtherNullBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 30,
            'answer_id' => null,
            'answer_comment_id' => null,
            'question_comment_id' => null,
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }

    /**
     * ベストアンサー登録
     * 失敗パターン
     * question_id以外 文字、記号
     *
     * @test
     * @return void
     */
    public function questionIdOtherCharacterBestAnswerCreateErrorTest()
    {
        $testData = [
            'question_id' => 30,
            'answer_id' => 'a',
            'answer_comment_id' => 'あ',
            'question_comment_id' => '+',
        ];

        $this->bestAnswerCreateResponseErrorJsonCheck($testData);
    }
}
