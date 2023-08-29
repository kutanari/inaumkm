<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request): View
    {
        return view('app/dashboard');
    }
}
