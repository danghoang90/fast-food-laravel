<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function showFormLogin()
    {
        return view('backend.users.login');
    }
}
