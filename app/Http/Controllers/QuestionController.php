<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterface;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    private ServiceInterface $question_service;

    public function __construct(ServiceInterface $question_service)
    {
        $this->question_service = $question_service;
    }

    // 質問全件取得
    public function getQuestion(Request $request)
    {
        $id = $request->id;
        $question = $this->question_service->getDataById($id);
        return $question;
    }

    // 質問1件取得
    public function getQuestions()
    {
        $questions = $this->question_service->getAll();
        return $questions;
    }
}
