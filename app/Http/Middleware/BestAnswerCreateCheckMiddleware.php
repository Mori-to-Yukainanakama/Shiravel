<?php

namespace App\Http\Middleware;

use App\Models\BestAnswer;
use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BestAnswerCreateCheckMiddleware
{
    /**
     * ベストアンサーを登録したい質問にすでに、ベストアンサーが登録されているかのチェック
     *
     * @param  BestAnswerRequest $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // ベストアンサーテーブルを登録したい質問idで検索
        $bestAnswer = BestAnswer::where('question_id', $request->question_id)->first();

        // すでに登録されている場合（質問idが存在する場合）
        if ($bestAnswer != null) {
            return response()->json(['message' => 'この質問のベストアンサーはすでに決まっています。']);
        }

        // nullのカウント変数
        $nullCount = 0;

        // リクエストの回答idがnullの場合、カウントアップ
        if ($request->answer_id == null) {
            $nullCount++;
        }

        // リクエストの回答コメントidがnullの場合、カウントアップ
        if ($request->answer_comment_id == null) {
            $nullCount++;
        }

        // リクエストの質問コメントidがnullの場合、カウントアップ
        if ($request->question_comment_id == null) {
            $nullCount++;
        }

        // 回答id、回答コメントid、質問コメントid 3つのnullの数が「2」じゃない場合、エラー
        // 上記3つの値が1つしか含まれない時でないと登録できない。
        if ($nullCount != 2) {
            return response()->json(['message' => '対象のidのセットが適切ではありません。']);
        }

        // 問題ない場合、処理を継続
        return $next($request);
    }
}
