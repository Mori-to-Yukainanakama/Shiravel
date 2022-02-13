<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestAnswer extends Model
{
    use HasFactory;

    protected $primaryKey = 'best_answer_id';


    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
