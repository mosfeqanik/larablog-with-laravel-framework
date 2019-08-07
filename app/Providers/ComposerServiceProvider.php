<?php

namespace App\Providers;

use App\Blog;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer(['partials.mata_dynamic','layouts.nav'],function ($view){
            $view->with('blog',Blog::where('status',1)->latest()->get());
        });
    }
}
