<?php

namespace App\Models\Models;

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
}
