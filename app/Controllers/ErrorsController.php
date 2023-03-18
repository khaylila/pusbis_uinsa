<?php

namespace App\Controllers;

class ErrorsController extends BaseController
{
    public function error403()
    {
        return view('errors/error403');
    }
    public function error404()
    {
        return view('errors/error404');
    }
    public function error500()
    {
        return view('errors/error500');
    }
    public function error503()
    {
        return view('errors/error503');
    }
}
