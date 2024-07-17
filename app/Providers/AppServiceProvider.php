<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use NumberFormatter;

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
        Blade::directive('money', function ($amount) {
            $formatter = new NumberFormatter('es_PE', NumberFormatter::CURRENCY);
            $formattedAmount = $formatter->formatCurrency($amount, 'PEN');

            return "<?php echo '$formattedAmount' ?>";
        });

    }
}
