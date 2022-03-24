<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionCommentTest extends TestCase
{

    public function setup(): void
    {
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('api/v1/questionComments');

        $response->assertStatus(200);
    }
}