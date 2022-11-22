<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::middleware ([

        'web',
        'auth',
        \Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class,
        PreventAccessFromCentralDomains::class,

    ])->group(function () {

    Route::name('admin.')->group(function () {

        //home
        Route::get('/home', [HomeController::class, 'index'])->name('home');

    });

//    Auth::routes(['register'=>false]);
});


