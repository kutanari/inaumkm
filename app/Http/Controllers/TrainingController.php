<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdateRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Training::class);

        $search = $request->get('search', '');

        $trainings = Training::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.trainings.index', compact('trainings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Training::class);

        return view('app.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Training::class);

        $validated = $request->validated();

        $training = Training::create($validated);

        return redirect()
            ->route('trainings.edit', $training)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Training $training): View
    {
        $this->authorize('view', $training);

        return view('app.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Training $training): View
    {
        $this->authorize('update', $training);

        return view('app.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TrainingUpdateRequest $request,
        Training $training
    ): RedirectResponse {
        $this->authorize('update', $training);

        $validated = $request->validated();

        $training->update($validated);

        return redirect()
            ->route('trainings.edit', $training)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Training $training
    ): RedirectResponse {
        $this->authorize('delete', $training);

        $training->delete();

        return redirect()
            ->route('trainings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
