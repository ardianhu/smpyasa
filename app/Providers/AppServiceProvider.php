<?php

namespace App\Providers;

use App\Models\Info;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        //
        // Share the authenticated user data with all views
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::user());
            $view->with('info', Info::latest()->first());
        });

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'id']) // also accepts a closure
                ->circular();
        });
    }
}
