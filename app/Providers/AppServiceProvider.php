<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Log;
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

        Blade::directive('hasPermissionsTo', function ($roles) {
            return "<?php if ( $roles = '*' || in_array(Auth::user()->role->name, explode('|', $roles)) ): ?>";
        });
        
        Blade::directive('endhasPermissionsTo', function () {
            return "<?php endif; ?>";
        });
    }
}
