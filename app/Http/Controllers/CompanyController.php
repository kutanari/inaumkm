<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\NumberOfEmployee;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Company::class);

        $search = $request->get('search', '');

        $companies = Company::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.companies.index', compact('companies', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Company::class);

        $users = User::pluck('name', 'id');
        $numberOfEmployees = NumberOfEmployee::pluck('label', 'id');
        $categories = Category::pluck('name', 'id');

        return view(
            'app.companies.create',
            compact('users', 'numberOfEmployees', 'categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Company::class);

        $validated = $request->validated();
        $validated['tags'] = json_decode($validated['tags'], true);

        $validated['other_certifications'] = json_decode(
            $validated['other_certifications'],
            true
        );

        $company = Company::create($validated);

        return redirect()
            ->route('companies.edit', $company)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Company $company): View
    {
        $this->authorize('view', $company);

        return view('app.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Company $company): View
    {
        $this->authorize('update', $company);

        $users = User::pluck('name', 'id');
        $numberOfEmployees = NumberOfEmployee::pluck('label', 'id');
        $categories = Category::pluck('name', 'id');

        return view(
            'app.companies.edit',
            compact('company', 'users', 'numberOfEmployees', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CompanyUpdateRequest $request,
        Company $company
    ): RedirectResponse {
        $this->authorize('update', $company);

        $validated = $request->validated();
        $validated['tags'] = json_decode($validated['tags'], true);

        $validated['other_certifications'] = json_decode(
            $validated['other_certifications'],
            true
        );

        $company->update($validated);

        return redirect()
            ->route('companies.edit', $company)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Company $company
    ): RedirectResponse {
        $this->authorize('delete', $company);

        $company->delete();

        return redirect()
            ->route('companies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
