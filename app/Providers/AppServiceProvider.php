<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use App\Events\JobCreated;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Listeners\NotifyUserOfJobCreation;
use Illuminate\Contracts\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //! it's configuer your application.
        //! it's executed after all of the dependencies is loaded.
        // TODO you can prevent lazy loading here to avoide (N+1) problem.

        Model::preventLazyLoading();

        //? you can configure your pagination css framework here.
        //? Paginator::defaultView('write your own');
        // Paginator::useBootstrap();
        // Paginator::useBootstrapFive();
        // Paginator::useBootstrapTwo();
        // Paginator::useBootstrapThree();
        // Paginator::useBootstrapFour();

        Route::pattern('id', '[0-9]+');
        //parent::boot();

        //? Gate here is available for every single request.
        // Gate::define('edit-job', function(User $user, Job $job){
        //     return $job
        //            ->employer
        //            ->user
        //            ->is($user);
        //            //? abort(403) by default.

        //    });
           //? if the user might be not authenticated
           //? then set the $user to null by default
        // Gate::define('edit-job', function(User $user = null, Job $job){
        //     return $job
        //            ->employer
        //            ->user
        //            ->is($user);
                    //? abort(403) by default.

        //    });

                                            //? or put ? before User class
        // Gate::define('edit-job', function(?User $user = null, Job $job){
        //     return $job
        //            ->employer
        //            ->user
        //            ->is($user);
                    //? abort(403) by default.

        //    });

        // JobCreated::listen(
        //     NotifyUserOfJobCreation::class,
        // );

        //? should discover events?
    }
    // public function shouldDiscoverEvents(): bool
    // {
    //     return true;
    // }


    // event cash artisan command before production
}
