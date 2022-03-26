<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestAnswer extends Model
{
    use HasFactory;

    protected $primaryKey = 'best_answer_id';

    protected $fillable = [
        'question_id',
        'answer_id',
        'answer_comment_id',
        'question_comment_id',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer', 'answer_id');
    }

    public function answerComment()
    {
        return $this->belongsTo('App\Models\AnswerComment', 'answer_comment_id');
    }

    public function questionComment()
    {
        return $this->belongsTo('App\Models\QuestionComment', 'question_comment_id');
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
