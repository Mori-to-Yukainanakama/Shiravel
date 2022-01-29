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
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\QuestionRepository::class,
        );

        $this->app->bind(
            \App\Services\ServiceInterface::class,
            function ($app) {
                return new \App\Services\QuestionService(
                    $app->make(\App\Repositories\RepositoryInterface::class)
                );
            },
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
