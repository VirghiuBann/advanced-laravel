<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Support\Str;
use App\PostcardSendingService;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelsComposer;
use App\Mixins\StrMixins;
use Illuminate\Routing\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // option 1 single view
        // View::share('channels', Channel::orderBy('name')->get());

        // option 2 - specific view
        // View::composer(['post.*', 'channel.index'], function ($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        // Option 3 - dedicated class
        View::composer('partials.channels.*', ChannelsComposer::class);

        // Facades
        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService('us', 4, 6);
        });

        // Macros
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
