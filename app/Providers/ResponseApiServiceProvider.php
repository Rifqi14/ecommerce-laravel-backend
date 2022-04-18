<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

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
        Response::macro('success', function ($data, $meta = null, $message = 'Success') {
            return Response::json([
                'data' => $data,
                'meta' => $meta,
                'status' => [
                    'success' => true,
                    'code' => HttpFoundationResponse::HTTP_OK,
                    'message' => $message,
                    'error' => [],
                ],
            ], 200);
        });

        Response::macro('error', function ($data, $message = 'Error', $code = HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR, $error) {
            return Response::json([
                'data' => $data,
                'meta' => null,
                'status' => [
                    'success' => false,
                    'code' => $code,
                    'message' => $message,
                    'error' => $error,
                ],
            ], $code);
        });

        Response::macro('notFound', function ($message = 'Not Found', $code = HttpFoundationResponse::HTTP_NOT_FOUND) {
            return Response::json([
                'data' => null,
                'meta' => null,
                'status' => [
                    'success' => false,
                    'code' => $code,
                    'message' => $message,
                    'error' => [],
                ],
            ], $code);
        });

        Response::macro('unauthorized', function ($message = 'Unauthorized', $code = HttpFoundationResponse::HTTP_UNAUTHORIZED) {
            return Response::json([
                'data' => null,
                'meta' => null,
                'status' => [
                    'success' => false,
                    'code' => $code,
                    'message' => $message,
                    'error' => [],
                ],
            ], $code);
        });

        Response::macro('validation', function ($message = 'Validation error', $code = HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY, $error) {
            return Response::json([
                'data' => null,
                'meta' => null,
                'status' => [
                    'success' => false,
                    'code' => $code,
                    'message' => $message,
                    'error' => $error,
                ],
            ], $code);
        });
    }
}
