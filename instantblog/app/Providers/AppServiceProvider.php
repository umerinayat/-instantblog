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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('public.archives', function ($view) {
            $view->with('archives', \App\Post::archives());
        });

        view()->composer('public.tags', function ($view) {
            $view->with('tags', \App\Tag::has('posts')->latest()->paginate(30));
        });

        view()->composer('posts.tagselect', function ($view) {
            $view->with('tags', \App\Tag::all());
        });

        view()->composer('layouts.nav', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });

        view()->composer('auth.login', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });

        view()->composer('layouts.master', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });

        view()->composer('public.*', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });

        view()->composer('member.*', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });

        view()->composer('home', function ($view) {
            $view->with('setting', \App\Setting::where('id', 1)->first());
        });
    }
}
