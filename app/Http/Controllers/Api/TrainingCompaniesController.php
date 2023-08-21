<?php
namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;

class TrainingCompaniesController extends Controller
{
    public function index(
        Request $request,
        Training $training
    ): CompanyCollection {
        $this->authorize('view', $training);

        $search = $request->get('search', '');

        $companies = $training
            ->companies()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompanyCollection($companies);
    }

    public function store(
        Request $request,
        Training $training,
        Company $company
    ): Response {
        $this->authorize('update', $training);

        $training->companies()->syncWithoutDetaching([$company->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Training $training,
        Company $company
    ): Response {
        $this->authorize('update', $training);

        $training->companies()->detach($company);

        return response()->noContent();
    }
}
