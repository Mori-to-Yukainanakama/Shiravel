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
}
