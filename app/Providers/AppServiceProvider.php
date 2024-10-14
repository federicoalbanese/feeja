<?php

namespace App\Providers;

use App\Contracts\Repositories\CardRepository;
use App\Contracts\Repositories\TransactionRepository;
use App\Contracts\Services\TransactionService;
use App\Repositories\Eloquent\CardEloquent;
use App\Repositories\Eloquent\TransactionEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public array $singletons = [
        //repositories
        TransactionRepository::class => TransactionEloquent::class,
        CardRepository::class        => CardEloquent::class,
        //services
        TransactionService::class => \App\Services\TransactionService::class
    ];

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
        //
    }
}
