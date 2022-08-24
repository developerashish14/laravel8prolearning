<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    //

    public function index()
    {
        echo '<h1>Fluent String</h1>';
        $slice = Str::of('welcome to my you tube channel')->after('welcome to ');
        echo $slice;

        $slice2  = Str::of('App\Http\Controllers\Controller')->afterLast('\\');
        echo $slice2;
    }
}
