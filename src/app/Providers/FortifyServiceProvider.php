<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
<<<<<<< HEAD
=======
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
>>>>>>> origin/main
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use App\Http\Requests\LoginRequest;
=======
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
>>>>>>> origin/main

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
<<<<<<< HEAD

=======
>>>>>>> origin/main
        Fortify::registerView(function(){
            return view('auth.register');
        });

        Fortify::loginView(function(){
            return view('auth.login');
        });

        RateLimiter::for('login',function(Request $request){
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

<<<<<<< HEAD
        $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);

=======
>>>>>>> origin/main
    }
}
