<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'user_id',
        'question_id',
        'content',
    ];

    // belongsToでquestion側を取得している

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function question()
    {
        // 相手のモデルを指定 belongsToメソッドは、主テーブル(Person)とは逆の従テーブルからのレコード取得使用する
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

    public function answerComments()
    {
        return $this->hasMany('App\Models\AnswerComment', 'answer_id');
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
