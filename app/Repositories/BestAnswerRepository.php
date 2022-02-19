<?php

namespace App\Repositories;

use App\Models\BestAnswer;

class BestAnswerRepository
{

    public function save($data)
    {
        $bestAnswer = new BestAnswer();
        $bestAnswer->fill($data)->save();
    }
}
