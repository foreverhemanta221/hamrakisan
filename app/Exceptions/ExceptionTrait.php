<?php
namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait {
    public function apiExceptions($request,$e){

        if($e instanceof MethodNotAllowedHttpException){
            return response()->json([
                'errors'=>"Incorrect Route"
            ],Response::HTTP_NOT_FOUND);
        }
        if($e instanceof ModelNotFoundException){
            return response()->json([
                'errors'=>"Model not found"
            ],Response::HTTP_NOT_FOUND);
        }
        if($e instanceof NotFoundHttpException){

           return response()->json(["message"=>"method not found"],404);
        }
    }
}