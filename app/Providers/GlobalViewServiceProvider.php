<?php

namespace App\Providers;

use Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('productImage', function ($productId) {
                $image = Http::withToken(env('BEARER_TOKEN'))->get(env('SSO_URL').'/product', [
                    'branch' => auth()->user()->detailConsumer->branch_id,
                    'id' => $productId
                ]);

                if ($image->successful()) {
                    $image = $image->json()['data'][0]['images'][0]['image'];
                }else {
                    $image = 'https://via.placeholder.com/300x300.png?text=No+Image';
                }

                return $image;
            });
        });
    }
}
