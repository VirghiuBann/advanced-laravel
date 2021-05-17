<?php

namespace App\Providers;

use App\Mixins\StrMixins;
use Illuminate\Support\Str;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class CustomMacroProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('partNumber', function ($part) {
            return 'AABC-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        Str::mixin(new StrMixins());

        ResponseFactory::macro('errorJson', function ($message = 'Default error message.') {
            return [
                'message' => $message,
                'error_code' => 1234
            ];
        });
    }
}
