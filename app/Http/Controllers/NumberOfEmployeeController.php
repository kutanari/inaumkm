<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\NumberOfEmployee;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NumberOfEmployeeStoreRequest;
use App\Http\Requests\NumberOfEmployeeUpdateRequest;

class NumberOfEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', NumberOfEmployee::class);

        $search = $request->get('search', '');

        $numberOfEmployees = NumberOfEmployee::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.number_of_employees.index',
            compact('numberOfEmployees', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', NumberOfEmployee::class);

        return view('app.number_of_employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        NumberOfEmployeeStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', NumberOfEmployee::class);

        $validated = $request->validated();

        $numberOfEmployee = NumberOfEmployee::create($validated);

        return redirect()
            ->route('number-of-employees.edit', $numberOfEmployee)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): View {
        $this->authorize('view', $numberOfEmployee);

        return view(
            'app.number_of_employees.show',
            compact('numberOfEmployee')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): View {
        $this->authorize('update', $numberOfEmployee);

        return view(
            'app.number_of_employees.edit',
            compact('numberOfEmployee')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        NumberOfEmployeeUpdateRequest $request,
        NumberOfEmployee $numberOfEmployee
    ): RedirectResponse {
        $this->authorize('update', $numberOfEmployee);

        $validated = $request->validated();

        $numberOfEmployee->update($validated);

        return redirect()
            ->route('number-of-employees.edit', $numberOfEmployee)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): RedirectResponse {
        $this->authorize('delete', $numberOfEmployee);

        $numberOfEmployee->delete();

        return redirect()
            ->route('number-of-employees.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
