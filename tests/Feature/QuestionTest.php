<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class QuestionTest extends TestCase
{

    /**
     * 質問全件取得
     *
     * @test
     * @return void
     */
    public function getQuestionsTest()
    {
        $response = $this->get('api/v1/questions');

        $response->assertStatus(200);
    }

    /**
     * 質問一件取得（id検索)
     * 成功パターン
     *
     * @test
     * @return void
     */
    public function getQuestionOkTest()
    {

        $response = $this->get('api/v1/questions/1');

        $response->assertStatus(200);
    }

    /**
     * 質問一件取得（id検索)
     * 半角文字入力エラーパターン
     *
     * @test
     * @return void
     */
    public function getQuestionHalfSizeCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/a');

        $response->assertStatus(404);
    }

    /**
     * 質問一件取得（id検索)
     * 全角文字入力エラーパターン
     *
     * @test
     * @return void
     */
    public function getQuestionFullWidthCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/あ');

        $response->assertStatus(404);
    }

    /**
     * 質問一件取得（id検索)
     * 記号入力エラーパターン
     *
     * @test
     * @return void
     */
    public function getQuestionSymbolCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/@');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/.');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/;');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/+');

        $response->assertStatus(404);
    }

    /**
     * 質問削除
     * 成功パターン
     *
     * @test
     * @return void
     */
    public function deleteQuestionTest()
    {

        $response = $this->delete('api/v1/questions/10');

        $response->assertStatus(200);
    }

    /**
     * 質問削除
     * 半角文字入力エラーパターン
     *
     * @test
     * @return void
     */
    public function deleteQuestionHalfSizeCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/a');

        $response->assertStatus(404);
    }

    /**
     * 質問削除
     * 全角文字入力エラーパターン
     *
     * @test
     * @return void
     */
    public function deleteQuestionFullWidthCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/あ');

        $response->assertStatus(404);
    }

    /**
     * 質問削除
     * 記号入力エラーパターン
     *
     * @test
     * @return void
     */
    public function deleteQuestionSymbolCharacterErrorTest()
    {

        $response = $this->get('api/v1/questions/@');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/.');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/;');

        $response->assertStatus(404);

        $response = $this->get('api/v1/questions/+');

        $response->assertStatus(404);
    }
}
