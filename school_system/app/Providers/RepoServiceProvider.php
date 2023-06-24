<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository',
        );

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository',
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
