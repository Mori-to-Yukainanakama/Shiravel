<?php

namespace Tests\Feature;

use Tests\TestCase;

class AnswerTest extends TestCase
{
    /**
     * 回答登録apipath
     */
    private const ANSWER_CREATE_PATH = 'api/v1/answer/create';

    /**
     * 回答登録apiレスポンス
     * 200パターンチェック
     * @return void
     */
    public function answerCreateResponse200Check($testData)
    {
        $response = $this->post($this::ANSWER_CREATE_PATH,$testData);
        $response->assertStatus(200);
    }

    /**
     * 回答登録apiレスポンス
     * 422パターンチェック
     * @return void
     */
    public function answerCreateResponse422Check($testData)
    {
        $response = $this->post($this::ANSWER_CREATE_PATH,$testData);
        $response->assertStatus(422);
    }

    /**
     * 回答登録成功パターン
     * @test
     * @return void
     */
    public function answerCreateTest(){
        $testData = [
            'user_id' => 1,
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse200Check($testData);
    }

    /**
     * 回答登録エラーパターン
     * user_idなし
     * @test
     * @return void
     */
    public function answerCreateNoUserIdErrorTest(){
        $testData = [
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);
    }

    /**
     * 回答登録エラーパターン
     * user_id数字以外
     * @test
     * @return void
     */
    public function answerCreateNumberUserIdErrorTest(){
        // 記号
        $testData = [
            'user_id' => '@',
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 記号
        $testData = [
            'user_id' => '+',
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 半角文字
        $testData = [
            'user_id' => 'a',
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 全角文字
        $testData = [
            'user_id' => 'あ',
            'question_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);
    }

    /**
     * 回答登録エラーパターン
     * question_idなし
     * @test
     * @return void
     */
    public function answerCreateNoQuestionIdErrorTest(){
        $testData = [
            'user_id' => 'あ',
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);
    }

    /**
     * 回答登録エラーパターン
     * question_id数字以外
     * @test
     * @return void
     */
    public function answerCreateNumberQuesrionIdErrorTest(){
        // 記号
        $testData = [
            'user_id' => 1,
            'question_id' => '@',
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 記号
        $testData = [
            'user_id' => 1,
            'question_id' => '+',
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 半角文字
        $testData = [
            'user_id' => 1,
            'question_id' => 'a',
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);

        // 全角文字
        $testData = [
            'user_id' => 1,
            'question_id' => 'あ',
            'content' => '質問内容（テスト）',
        ];
        $this->answerCreateResponse422Check($testData);
    }

    /**
     * 回答登録エラーパターン
     * content半角1文字成功パターン
     * @test
     * @return void
     */
    public function answerContentHalfSizeCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'question_id' => 1,
            'content' => 'a',
        ];
        $this->answerCreateResponse200Check($testData);
    }

    /**
     * 質問登録
     * content全角1文字成功パターン
     *
     * @test
     * @return void
     */
    public function answerContentFullWidthCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'question_id' => 1,
            'content' => 'あ',
        ];
        $this->answerCreateResponse200Check($testData);
    }

    /**
     * 質問登録
     * content文字数制限エラーパターン
     *
     * @test
     * @return void
     */
    public function answerContentHalfSizeCharacterLimit16384ErrorTest()
    {
        $testStr = "";
        for ($i = 0; $i < 16385; $i++) {
            $testStr .= "a";
        }

        $testData = [
            'user_id' => 1,
            'question_id' => 1,
            'content' => $testStr,
        ];
        $this->answerCreateResponse422Check($testData);
    }

    /**
     * 質問登録
     * content文字数制限成功パターン
     *
     * @test
     * @return void
     */
    public function answerContentHalfSizeCharacterLimit16384Test()
    {
        $testStr = "";
        for ($i = 0; $i < 16384; $i++) {
            $testStr .= "a";
        }

        $testData = [
            'user_id' => 1,
            'title' => 'testtesttesttesttes',
            'content' => $testStr,
        ];
        $this->answerCreateResponse200Check($testData);
    }
}

