<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // bindメソッドはインスタンスを生成してくれる

        $this->app->bind(
            \App\Repositories\QuestionRepository::class,
        );
        $this->app->bind(
            \App\Services\QuestionService::class,
        );

        $this->app->bind(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\UserRepository::class,
        );
        $this->app->bind(
            \App\Services\UserService::class,
        );

        $this->app->bind(
            \App\Repositories\AnswerCommentRepository::class,
        );
        $this->app->bind(
            \App\Services\AnswerCommentService::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
