<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->fullUrl();
    }
}
