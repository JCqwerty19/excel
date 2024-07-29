<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\ProductRepositoryInterface as ProductInterface;
use App\Repositories\Implementators\Eloquent\ProductRepositoryImplementator;

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
        $this->app->bind(ProductInterface::class,ProductRepositoryImplementator::class);
    }
}
