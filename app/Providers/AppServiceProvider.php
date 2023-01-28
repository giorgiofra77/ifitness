<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('date', function ($expression) {
            return "<?php echo \Carbon\Carbon::createFromDate($expression)->format('d/m/Y'); ?>";
        });

        Blade::directive('money', function ($amount) {
            return "<?php echo '€ ' . number_format($amount, 2, ',', '.'); ?>";
        });

        Blade::directive('numeric', function ($amount) {
            return "<?php echo number_format($amount, 2, ',', '.'); ?>";
        });
    }
}
