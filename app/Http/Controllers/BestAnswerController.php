<?php

namespace App\Http\Controllers;

use App\Http\Requests\BestAnswerRequest;
use App\Services\BestAnswerService;
use Illuminate\Http\Request;

class BestAnswerController extends Controller
{

    // QuestionServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private BestAnswerService $best_answer_service;

    /**
     * コンストラクタ
     *
     * @param BestAnswerService
     * @return void
     */
    public function __construct(BestAnswerService $best_answer_service)
    {
        $this->best_answer_service = $best_answer_service;
    }

    /**
     * ベストアンサー登録
     *
     * @param Request
     * @return void
     */
    public function create(BestAnswerRequest $request)
    {
        $data = [
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
            'answer_comment_id' => $request->answer_comment_id,
            'question_comment_id' => $request->question_comment_id,
        ];
        $this->best_answer_service->create($data);
    }
}
