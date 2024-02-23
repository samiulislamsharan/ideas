<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        PaginationPaginator::useBootstrapFive();

        View::share(
            'topUsers',
            User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->limit(5)
                ->get()
        );
    }
}
