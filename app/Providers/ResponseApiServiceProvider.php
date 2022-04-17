<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseApiServiceProvider extends ServiceProvider
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
        Response::macro('success', function ($data, $meta, $status = ['success' => true, 'code' => 200, 'message' => 'OK', 'error' => []]) {
            return Response::json([
                'data' => $data,
                'meta' => $meta,
                'status' => $status,
            ], 200);
        });
    }
}
