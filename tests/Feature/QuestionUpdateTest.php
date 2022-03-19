<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuestionUpdateTest extends TestCase
{

    private const QUESTION_UPDATE_PATH = 'api/v1/questions/update';

    /**
     * 質問更新レスポンスチェック
     * 200レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function questionCreateResponse200Check($testData)
    {
        $response = $this->post($this::QUESTION_UPDATE_PATH, $testData);
        $response->assertStatus(200);
    }

    /**
     * 質問更新レスポンスチェック
     * 422レスポンスチェック
     *
     * @param $testData
     * @return void
     */
    public function questionCreateResponse422Check($testData)
    {
        $response = $this->post($this::QUESTION_UPDATE_PATH, $testData);
        $response->assertStatus(422);
    }

    /**
     * 質問更新
     * 成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionTest()
    {
        // 成功パターン
        $testData = [
            'user_id' => 1,
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * user_id無しエラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionNoUserIdErrorTest()
    {
        $testData = [
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * user_id数字以外エラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionNumericUserIdErrorTest()
    {
        // 記号
        $testData = [
            'user_id' => '@',
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);

        // 記号
        $testData = [
            'user_id' => '+',
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);

        // 半角文字
        $testData = [
            'user_id' => 'a',
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);

        // 全角文字
        $testData = [
            'user_id' => 'あ',
            'title' => '質問タイトル（テスト）',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * title無しエラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionNoTitleErrorTest()
    {
        $testData = [
            'user_id' => 1,
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * title半角1文字成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleHalfSizeCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'title' => 'a',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * title全角1文字成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleFullWidthCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'title' => 'あ',
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * title 全角30文字数制限エラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleFullWidthCharacterLimit30ErrorTest()
    {
        $testStr = "";
        // 全角31文字
        for ($i = 0; $i < 31; $i++) {
            $testStr .= "あ";
        }
        $testData = [
            'user_id' => 1,
            'title' => $testStr,
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * title 半角30文字数制限エラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleHalfSizeCharacterLimit30ErrorTest()
    {
        $testStr = "";
        // 半角31文字
        for ($i = 0; $i < 31; $i++) {
            $testStr .= "a";
        }
        $testData = [
            'user_id' => 1,
            'title' => $testStr,
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * title 全角30文字数制限成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleFullWidthCharacterLimit30Test()
    {
        $testStr = "";
        // 全角30文字
        for ($i = 0; $i < 30; $i++) {
            $testStr .= "あ";
        }
        $testData = [
            'user_id' => 1,
            'title' => $testStr,
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * title 半角30文字数制限成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionTitleHalfSizeCharacterLimit30Test()
    {
        $testStr = "";
        // 半角30文字
        for ($i = 0; $i < 30; $i++) {
            $testStr .= "a";
        }

        $testData = [
            'user_id' => 1,
            'title' => $testStr,
            'content' => '質問内容（テスト）',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * content無しエラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionNoContentTest()
    {
        $testData = [
            'user_id' => 1,
            'title' => 'testtesttesttesttes',
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * content半角1文字成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionContentHalfSizeCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'title' => 'testtesttesttesttes',
            'content' => 'a',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * content全角1文字成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionContentFullWidthCharacterLimit1Test()
    {
        $testData = [
            'user_id' => 1,
            'title' => 'testtesttesttesttes',
            'content' => 'あ',
        ];
        $this->questionCreateResponse200Check($testData);
    }

    /**
     * 質問更新
     * content文字数制限エラーパターン
     *
     * @test
     * @return void
     */
    public function createQuestionContentHalfSizeCharacterLimit16384ErrorTest()
    {
        $testStr = "";
        for ($i = 0; $i < 16385; $i++) {
            $testStr .= "a";
        }

        $testData = [
            'user_id' => 1,
            'title' => 'testtesttesttesttes',
            'content' => $testStr,
        ];
        $this->questionCreateResponse422Check($testData);
    }

    /**
     * 質問更新
     * content文字数制限成功パターン
     *
     * @test
     * @return void
     */
    public function createQuestionContentHalfSizeCharacterLimit16384Test()
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
        $this->questionCreateResponse200Check($testData);
    }
}
