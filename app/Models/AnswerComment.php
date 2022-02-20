<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    use HasFactory;

    // プライマリーキーの指定
    protected $primaryKey = 'answer_comment_id';

    protected $fillable = [
        'answer_comment_id',
        'user_id',
        'answer_id',
        'content',
    ];

    // protected $hidden = [
    //     'answer_id',
    //     'user_id',
    //     'question_id',
    // ];

    // belongsToでAnswer側を取得している
    public function answer()
    {
        // 相手のモデルを指定　belongsToメソッドは、主テーブル(Answer)とは逆の従テーブルからのレコード取得使用する
        return $this->belongsTo('App\Models\Answer', 'answer_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
