<?php

namespace Secrethash\R8;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class R8ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_reviews_table.php.stub' => $this->app->databasePath()."/migrations/{$this->timestamp(10)}_create_reviews_table.php",
            __DIR__.'/../database/migrations/create_rate_types_table.php.stub' => $this->app->databasePath()."/migrations/{$this->timestamp(20)}_create_rate_types_table.php",
            __DIR__.'/../database/migrations/create_ratings_table.php.stub' => $this->app->databasePath()."/migrations/{$this->timestamp(30)}_create_ratings_table.php",
        ], 'migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Create Timestamps
     *
     * @return Carbon\Carbon
     */
    protected function timestamp($seconds)
    {
        $timestamp = Carbon::now()->addSeconds($seconds)
                            ->format('Y_m_d_His');
        return $timestamp;
    }
}
