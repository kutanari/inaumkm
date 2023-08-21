<?php

namespace App\Http\Controllers\Api;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;
use App\Http\Resources\TrainingCollection;
use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdateRequest;

class TrainingController extends Controller
{
    public function index(Request $request): TrainingCollection
    {
        $this->authorize('view-any', Training::class);

        $search = $request->get('search', '');

        $trainings = Training::search($search)
            ->latest()
            ->paginate();

        return new TrainingCollection($trainings);
    }

    public function store(TrainingStoreRequest $request): TrainingResource
    {
        $this->authorize('create', Training::class);

        $validated = $request->validated();

        $training = Training::create($validated);

        return new TrainingResource($training);
    }

    public function show(Request $request, Training $training): TrainingResource
    {
        $this->authorize('view', $training);

        return new TrainingResource($training);
    }

    public function update(
        TrainingUpdateRequest $request,
        Training $training
    ): TrainingResource {
        $this->authorize('update', $training);

        $validated = $request->validated();

        $training->update($validated);

        return new TrainingResource($training);
    }

    public function destroy(Request $request, Training $training): Response
    {
        $this->authorize('delete', $training);

        $training->delete();

        return response()->noContent();
    }
}
