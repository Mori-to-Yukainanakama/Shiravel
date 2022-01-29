<?php

namespace App\Services;

// Serviceのインターフェース 使い回しする
interface ServiceInterface
{
    // 全件取得
    public function getAll();

    // テーブルのプライマリーキーで1件取得
    public function getDataById($id);

    // 登録
    public function create($data);
}
