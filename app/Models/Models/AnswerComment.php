<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    use HasFactory;

    // プライマリーキーの指定
    // protected $primaryKey = 'answer_id';

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
}