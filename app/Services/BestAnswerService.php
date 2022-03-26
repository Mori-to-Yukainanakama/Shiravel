<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\BestAnswerRepository;
use App\Repositories\QuestionRepository;
use Throwable;

// Serviceのインターフェースを継承してる
class BestAnswerService
{

    // UserRepositoryのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private BestAnswerRepository $best_answer_repository;
    private QuestionRepository $question_repository;

    public function __construct(BestAnswerRepository $best_answer_repository, QuestionRepository $question_repository)
    {
        $this->best_answer_repository = $best_answer_repository;
        $this->question_repository = $question_repository;
    }

    /**
     * ベストアンサー登録
     * ベストアンサー登録時に対象に質問を「解決済み」に更新する
     *
     * @param [type] $data
     * @return void
     */
    public function create($data)
    {
        try {
            // トランザクションスタート
            DB::beginTransaction();

            // ベストアンサーを登録
            $this->best_answer_repository->save($data);

            // ベストアンサーを登録した質問を取得
            $question = $this->question_repository->getDataById($data['question_id']);

            // ベストアンサーを登録した質問を解決済みに変更
            $this->question_repository->isSolevedUpdate($question);

            // 処理が正常終了した場合、DBに保存
            DB::commit();
        } catch (Throwable $e) {

            // 処理途中にエラーが発生したら、全ての更新を元に戻す
            // ログの出力をするようにしないといけない
            DB::rollBack();
        }
    }
}
