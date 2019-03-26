<?php

namespace Obfuscate\Laravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('obfuscate', function ($expression) {
            return "<?php echo Obfuscate\Obfuscate::str($expression); ?>";
        });
    }
}
