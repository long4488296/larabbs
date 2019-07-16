<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
        // app(\Dingo\Api\Exception\Handler::class)->register(function (\App\Exceptions\Api\CommonException $exception) {
        //     //return response($exception->getMessage(), $exception->getCode());
        //     //return $exception->render();
        // });
        
        // \API::error(function  (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException  $exception)  {
        //     throw new \Symfony\Component\HttpKernel\Exception\HttpException(404,  '404 Not Found');  
        // });
    
        // \API::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
        //     abort(404);
        // });
    
        // \API::error(function (\Illuminate\Auth\Access\AuthorizationException $exception) {
        //     abort(403, $exception->getMessage().'dasdasd');
        // });
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        Schema::defaultStringLength(191);
        //
    }
}
