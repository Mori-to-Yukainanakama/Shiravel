<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // UserServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private UserService $user_service;

    /**
     * コンストラクタ
     *
     * @param UserService $user_service
     */
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * ユーザー1件取得
     *
     * @param [type] $id
     * @return User
     */
    public function getUser($id)
    {
        return $user = $this->user_service->getDataById($id);
    }

    /**
     * ユーザー全件取得
     *
     * @return User
     */
    public function getUsers()
    {
        return $users = $this->user_service->getAll();
    }
}
