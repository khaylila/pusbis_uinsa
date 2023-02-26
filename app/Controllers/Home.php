<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('mainpage');
    }

    public function mainMenu(){
        return view('mainmenu');
    }
}
