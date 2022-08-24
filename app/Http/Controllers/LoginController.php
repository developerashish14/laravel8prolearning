<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {

        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        return 'Email:'.$email.'Password:'.$password;
    }
}
