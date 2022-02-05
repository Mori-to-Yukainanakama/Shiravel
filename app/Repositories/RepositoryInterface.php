<?php

namespace App\Repositories;

/**
 * Repositoryのインターフェース
 * 共通で使用されるメソッドのみ用意する
 */
interface RepositoryInterface
{
    // 全件取得
    public function getAll();

    // テーブルのプライマリーキーで1件取得
    public function getDataById($id);

    //登録
    public function save($data);

    // 削除
    public function delete($id);
}
