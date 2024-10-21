<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    // todo login page
    function loginindex()
    {
        return view('Auth.login');
    }

    // todo login to profile
    public function Login(){
        
    }

    // todo add new account
    public function Regist(){

    }
    
    // todo return info for user
    public function ProfileInfo(){

    }

    // todo logout in account
    public function Logout(){

    }

}
