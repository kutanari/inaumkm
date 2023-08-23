<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
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
        $user = auth()->user();
        if(!$user->company) {
            $company = new Company;
            $company->user_id = $user->id;
            $company->name = sprintf("%s's Company", $user->name);
            $company->save();
        }
        return view('user-dashboard');
    }

    public function company(Request $request): View
    {
        return view('user-company');
    }
}
