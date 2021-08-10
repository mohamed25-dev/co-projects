<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::composer(['home', 'includes.category_options', 'admin.projects.edit'], CategoryComposer::class);
    }
}
