<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Cat;
use App\CatChild;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('adminUrl',getenv('ADMIN_URL'));
        View::share('publicUrl',getenv('PUBLIC_URL'));
        View::share('adminfiles',getenv('ADMIN_FILES'));
        View::share('arCat',Cat::all());
        View::share('arCatChild',CatChild::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
