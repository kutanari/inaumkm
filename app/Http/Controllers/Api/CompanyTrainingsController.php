<?php
namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingCollection;

class CompanyTrainingsController extends Controller
{
    public function index(
        Request $request,
        Company $company
    ): TrainingCollection {
        $this->authorize('view', $company);

        $search = $request->get('search', '');

        $trainings = $company
            ->trainings()
            ->search($search)
            ->latest()
            ->paginate();

        return new TrainingCollection($trainings);
    }

    public function store(
        Request $request,
        Company $company,
        Training $training
    ): Response {
        $this->authorize('update', $company);

        $company->trainings()->syncWithoutDetaching([$training->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Company $company,
        Training $training
    ): Response {
        $this->authorize('update', $company);

        $company->trainings()->detach($training);

        return response()->noContent();
    }
}
