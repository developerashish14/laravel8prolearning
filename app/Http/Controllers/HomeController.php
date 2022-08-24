<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($name)
    {
        return 'hi from home controller'.$name;
    }
}
