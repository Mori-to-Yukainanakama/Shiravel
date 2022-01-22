<?php

namespace App\Repositories;

// Repositoryのインターフェース 使い回し
interface ShiravelRepositoryInterface
{
    // 全件取得
    public function getAll();

    // テーブルのプライマリーキーで1件取得
    public function getDataById($id);
}
