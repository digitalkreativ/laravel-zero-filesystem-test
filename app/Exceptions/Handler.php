<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Symfony\Component\Console\Exception\RuntimeException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        // \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        // RuntimeException::class,
    ];

    /**
     * A list of the exception types that should not be reported if they contain certain messages
     *
     * @var array
     */
    protected $dontReportMessages = [
        RuntimeException::class => [
            'Not enough arguments',
        ],
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {

        if( \Phar::running( ) ){
            foreach( $this->dontReportMessages as $type => $messages ){
                if( $exception instanceof  $type ){
                    if( Str::contains( $exception->getMessage(), $messages) ){
                        return;
                    }
                }
            }
        }


        parent::report($exception);
    }

}
