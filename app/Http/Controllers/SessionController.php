<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionController extends Controller
{
    //
    public function getSessionData(Request $request)
    {
        if($request->session()->has('name')){
                
            }
        else{
            echo 'no data in the session';
        }
    }

    public function storeSessionData(Request $request)
    {
        $request->session()->put('name','Jennifer');
        echo "Data has been added to the session";
    }

    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('name');
        echo "data has been removed from the session";
    }
}
