<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MethodsController extends Controller
{
    public function __invoke()
    {
        return "Invoke";
    }
    public function example()
    {
        return "example";
    }

    public function get()
    {
        return "GET METHOD";
    }

    public function post()
    {
        return "POST METHOD";
    }

    public function put()
    {
        return "PUT METHOD";
    }

    public function patch()
    {
        return "PATCH METHOD";
    }

    public function delete()
    {
        return "DEL METHOD";
    }

    public function options()
    {
        return "Options METHOD";
    }


}
