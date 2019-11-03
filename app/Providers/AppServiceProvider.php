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
        $this->app->when('App\Http\Controllers\SumController')
            ->needs('App\Contracts\MathOperationInterface')
            ->give('App\Services\Sum');
 
        $this->app->when('App\Http\Controllers\MultiplyController')
            ->needs('App\Contracts\MathOperationInterface')
            ->give('App\Services\Multiply');
        
        $this->app->when('App\Http\Controllers\PrimeNumberController')
            ->needs('App\Contracts\NumberSequenceInterface')
            ->give('App\Services\PrimeNumber');
        
        $this->app->when('App\Http\Controllers\FibonacciController')
            ->needs('App\Contracts\NumberSequenceInterface')
            ->give('App\Services\Fibonacci');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
