<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function unauthorized()
    {
        return response()->view('errors.401', [], 401);
    }

    public function forbidden()
    {
        return response()->view('errors.403', [], 403);
    }

    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }

    public function authenticationTimeout()
    {
        return response()->view('errors.419', [], 419);
    }

    public function tooManyRequests()
    {
        return response()->view('errors.429', [], 429);
    }

    public function internalServerError()
    {
        return response()->view('errors.500', [], 500);
    }

    public function serviceUnavailable()
    {
        return response()->view('errors.503', [], 503);
    }
}
