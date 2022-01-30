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
}
