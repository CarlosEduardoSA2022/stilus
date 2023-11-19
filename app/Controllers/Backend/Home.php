<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        if(!session()->has('loggedIn')) return redirect()->route('back.login');
        
        return view('backend/home');
    }
}
