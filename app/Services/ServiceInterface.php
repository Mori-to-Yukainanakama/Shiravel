<?php

namespace App\Services;

/**
 * Serviceのインターフェース
 * 共通で使用されるメソッドのみ用意する
 */
interface ServiceInterface
{
    // 全件取得
    public function getAll();

    // テーブルのプライマリーキーで1件取得
    public function getDataById($id);

    // 登録
    public function create($data);

    // 削除
    public function delete($id);
}
