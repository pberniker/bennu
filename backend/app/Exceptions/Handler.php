<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, \Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return $this->response($e->validator->errors()->getMessages(), Response::HTTP_BAD_REQUEST);
        }

        return $this->responseException($e);
    }

    private function responseException(\Throwable $e): Response
    {
        $isProd = strtolower(config('app.env')) == 'production';

        if ($isProd) {
            return $this->response(['message' => 'Internal server error']);    
        }

        return $this->response([                
                'message' => $e->getMessage(),
                'exception' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]
        );
    }

    private function response(array $data, int $code = Response::HTTP_INTERNAL_SERVER_ERROR): Response
    {
        return response($data, $code);
    }
}
