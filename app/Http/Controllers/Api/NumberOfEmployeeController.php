<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\NumberOfEmployee;
use App\Http\Controllers\Controller;
use App\Http\Resources\NumberOfEmployeeResource;
use App\Http\Resources\NumberOfEmployeeCollection;
use App\Http\Requests\NumberOfEmployeeStoreRequest;
use App\Http\Requests\NumberOfEmployeeUpdateRequest;

class NumberOfEmployeeController extends Controller
{
    public function index(Request $request): NumberOfEmployeeCollection
    {
        $this->authorize('view-any', NumberOfEmployee::class);

        $search = $request->get('search', '');

        $numberOfEmployees = NumberOfEmployee::search($search)
            ->latest()
            ->paginate();

        return new NumberOfEmployeeCollection($numberOfEmployees);
    }

    public function store(
        NumberOfEmployeeStoreRequest $request
    ): NumberOfEmployeeResource {
        $this->authorize('create', NumberOfEmployee::class);

        $validated = $request->validated();

        $numberOfEmployee = NumberOfEmployee::create($validated);

        return new NumberOfEmployeeResource($numberOfEmployee);
    }

    public function show(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): NumberOfEmployeeResource {
        $this->authorize('view', $numberOfEmployee);

        return new NumberOfEmployeeResource($numberOfEmployee);
    }

    public function update(
        NumberOfEmployeeUpdateRequest $request,
        NumberOfEmployee $numberOfEmployee
    ): NumberOfEmployeeResource {
        $this->authorize('update', $numberOfEmployee);

        $validated = $request->validated();

        $numberOfEmployee->update($validated);

        return new NumberOfEmployeeResource($numberOfEmployee);
    }

    public function destroy(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): Response {
        $this->authorize('delete', $numberOfEmployee);

        $numberOfEmployee->delete();

        return response()->noContent();
    }
}
