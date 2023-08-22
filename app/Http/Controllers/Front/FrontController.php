<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request): View
    {
        return view('home');
    }

    public function about(Request $request): View
    {
        return view('about');
    }

    public function contact(Request $request): View
    {
        return view('contact');
    }

    public function dashboard(Request $request): View
    {
        return view('user-dashboard');
    }
}
