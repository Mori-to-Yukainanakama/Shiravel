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
        //Question系
        $this->app->bind(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\QuestionRepository::class,
        );
        $this->app->bind(
            \App\Services\ServiceInterface::class,
            \App\Services\QuestionService::class,
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
