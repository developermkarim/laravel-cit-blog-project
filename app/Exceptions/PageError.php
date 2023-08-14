<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class PageError extends Exception
{
    public function render($reqeust, Throwable $exception)
    {
       if($exception instanceof NotFoundHttpException){
        return response()->view('errors.404',[],404);
       }

       if($exception instanceof \PDOException){
        return response()->view('errors.500',[],500);
       }

       return parent::render($reqeust, $exception);
    }
}
