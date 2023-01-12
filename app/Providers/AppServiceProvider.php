<?php

namespace App\Providers;

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
    /*public function boot()
    {
        View::composer(
            ['\Employer\showempprofile','\masterE','\Employer\createjobpost','\Employer\displaystudentprofile','\Employer\editempprofile','\Employer\empfeedback','\Employer\searchpost','\Employer\searchstudent'],
            callback:'App\Http\View\Composers\EmployerComposer'
        );
    }*/
}
