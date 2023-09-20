<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\NumberOfEmployee;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Spatie\Browsershot\Browsershot;

class FrontController extends Controller
{
    use WithFileUploads;
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
        } else {
            $company = auth()->user()->company;
        }

        $persen_completness = Company::getPercenCompletness($company);
        return view('user-front/user-dashboard', compact('persen_completness'));
    }

    public function company(Request $request): View
    {
        $users = User::pluck('name', 'id');
        $nr_of_employee = NumberOfEmployee::pluck('label', 'id');
        $categories = Category::pluck('name', 'id');
        $jenis_usaha = Company::$jenis_usaha;
        $company = auth()->user()->company;

        return view('user-front/user-company',
            compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')   
        );
    }

    public function previewCompro(Request $request, $id)
    {
        $users = User::pluck('name', 'id');
        $nr_of_employee = NumberOfEmployee::pluck('label', 'id');
        $categories = Category::pluck('name', 'id');
        $jenis_usaha = Company::$jenis_usaha;
        $company = auth()->user()->company;

        if ($id == 2) {
            return view('user-front/user-compro-2',
                compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')
            );
        } else {
            return view('user-front/user-compro',
                compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')
            );
        }
    }

    public function downloadCompro(Request $request, $pdf = '')
    {
        $users = User::pluck('name', 'id');
        $nr_of_employee = NumberOfEmployee::pluck('label', 'id');
        $categories = Category::pluck('name', 'id');
        $jenis_usaha = Company::$jenis_usaha;
        $company = auth()->user()->company;

        // if ($id == 2) {
        //     return view('user-front/user-compro-2',
        //         compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')
        //     );
        // } else {
            // return view('user-front/user-compro-pdf',
            //     compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')
            // );
        // }
        if(!empty($pdf)){
            $pdf = PDF::loadView('user-front/user-compro-pdf', compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha'));
            $pdf->setOption('margin-top', 5);
            $pdf->setOption('margin-right', 5);
            $pdf->setOption('margin-bottom', 5);
            $pdf->setOption('margin-left', 5); 
            return $pdf->download('compro.pdf');
        } else {
            return view('user-front/user-compro-pdf',
                compact('company', 'users', 'nr_of_employee', 'categories', 'jenis_usaha')
            );
        }
    }
}
