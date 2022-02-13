<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    use HasFactory;

    protected $primary_key = 'question_comment_id';

    // belongsToでQuestion側を取得している
    public function question()
    {
        // 相手のモデルを指定　belongsToメソッドは、主テーブル(Question)とは逆の従テーブルからのレコード取得使用する
        return $this->belongsTo('App\Models\Question');
    }
}
