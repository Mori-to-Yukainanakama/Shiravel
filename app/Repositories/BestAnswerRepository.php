<?php

namespace App\Repositories;

use App\Models\BestAnswer;

class BestAnswerRepository
{

    /**
     * ベストアンサー登録
     *
     * @param $data
     * @return void
     */
    public function save($data)
    {
        $bestAnswer = new BestAnswer();
        $bestAnswer->fill($data)->save();
    }
}
