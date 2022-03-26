<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    // プライマリーキーの指定
    protected $primaryKey = 'question_id';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_answered',
        'is_solved',
    ];

    // hasManyメソッドは相手が複数あるときに取得できる
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }

    public function questionComments()
    {
        return $this->hasMany('App\Models\QuestionComment', 'question_id');
    }

    public function answerComments()
    {
        return $this->hasMany('App\Models\AnswerComment', 'question_id');
    }

    public function bestAnswer()
    {
        return $this->hasOne('App\Models\BestAnswer', 'question_id');
    }

    /**
     * 登録日の日付フォーマットを変更するアクセサ
     */
    public function getCreatedAtAttribute()
    {
        $date = date('Y/m/d', strtotime($this->attributes['created_at']));
        return $this->attributes['created_at'] = $date;
    }

    /**
     * 回答フラグを文字列に変更するアクセサ
     */
    public function getIsAnsweredAttribute()
    {
        if ($this->attributes['is_answered'] == true) {
            return $this->attributes['is_answered'] = "回答有";
        }

        return $this->attributes['is_answered'] = "回答無";
    }

    /**
     * 解決フラグを文字列に変更するアクセサ
     */
    public function getIsSolvedAttribute()
    {
        if ($this->attributes['is_solved'] == true) {
            return $this->attributes['is_solved'] = "解決済";
        }

        return $this->attributes['is_solved'] = "未解決";
    }
}
