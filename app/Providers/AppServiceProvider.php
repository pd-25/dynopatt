<?php

namespace App\Providers;

use App\Service\Category\CategoryInterface;
use App\Service\Category\CategoryRepo;
use App\Service\Course\CourseInterface;
use App\Service\Course\CourseRepo;
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
        $this->app->bind(CategoryInterface::class, CategoryRepo::class);
        $this->app->bind(CourseInterface::class, CourseRepo::class);
        
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
