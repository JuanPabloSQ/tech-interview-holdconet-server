<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    // ...

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception instanceof HttpException ? $exception->getStatusCode() : 500);
        }

        return parent::render($request, $exception);
    }
}
