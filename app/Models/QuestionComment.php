<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    use HasFactory;
    // プライマリーキーの指定
    protected $primaryKey = 'question_comment_id';

    protected $fillable = [
        'user_id',
        'question_id',
        'content',
    ];

    // belongsToでQuestion側を取得している
    public function question()
    {
        // 相手のモデルを指定 belongsToメソッドは、主テーブル(Question)とは逆の従テーブルからのレコード取得使用する
        return $this->belongsTo('App\Models\Question', 'questino_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * 登録日の日付フォーマットを変更するアクセサ
     */
    public function getCreatedAtAttribute()
    {
        $date = date('Y/m/d', strtotime($this->attributes['created_at']));
        return $this->attributes['created_at'] = $date;
    }
}
