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
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'answer_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function questionComments()
    {
        return $this->hasMany('App\Models\QuestionComment', 'question_comment_id');
    }
}
