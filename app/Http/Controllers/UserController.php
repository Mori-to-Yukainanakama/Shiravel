<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // UserServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    // ユーザー1件取得
    public function getUser($id)
    {
        $user = $this->user_service->getDataById($id);
        return $user;
    }

    // ユーザー全取得
    public function getUsers()
    {
        $users = $this->user_service->getAll();
        return $users;
    }

    // 質問登録
    public function create()
    {
        $data = [
            'user_id' => 1,
            'title' => 'タイトルうううう',
            'content' => 'コンテンツつううううう',
        ];
        $this->question_service->create($data);
    }
}
