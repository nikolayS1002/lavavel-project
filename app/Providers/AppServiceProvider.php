<?php

namespace App\Providers;

use App\Contracts\Parser;
use App\Contracts\Social;
use App\Contracts\Upload;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(
            Parser::class,
            ParserService::class
        );

        $this->app->bind(
            Social::class,
            SocialService::class
        );

        $this->app->bind(
            Upload::class,
            UploadService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
