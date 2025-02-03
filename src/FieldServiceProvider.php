<?php

namespace Sylapi\NovaDrafts;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sylapi\NovaDrafts\Commands\CreateDraftsMigration;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateDraftsMigration::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function routes()
    {
        Route::middleware(['api'])
            ->prefix('nova-vendor/nova-drafts')
            ->group(__DIR__ . '/../routes/api.php');
    }
}
