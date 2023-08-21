<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\NumberOfEmployee;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyCollection;

class NumberOfEmployeeCompaniesController extends Controller
{
    public function index(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): CompanyCollection {
        $this->authorize('view', $numberOfEmployee);

        $search = $request->get('search', '');

        $companies = $numberOfEmployee
            ->companies()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompanyCollection($companies);
    }

    public function store(
        Request $request,
        NumberOfEmployee $numberOfEmployee
    ): CompanyResource {
        $this->authorize('create', Company::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['nullable', 'max:255', 'string'],
            'founder_name' => ['nullable', 'max:255', 'string'],
            'address' => ['nullable', 'max:255', 'string'],
            'latlong' => ['nullable', 'max:255', 'string'],
            'province' => ['nullable', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'website_url' => ['nullable', 'max:255', 'string'],
            'slug' => [
                'required',
                'unique:companies,slug',
                'max:255',
                'string',
            ],
            'contact_name' => ['nullable', 'max:255', 'string'],
            'contact_email' => ['nullable', 'max:255', 'string'],
            'contact_number' => ['nullable', 'max:255', 'string'],
            'established_year' => ['nullable', 'max:255', 'string'],
            'logo_picture' => ['nullable', 'max:255', 'string'],
            'profile_picture' => ['nullable', 'max:255', 'string'],
            'youtube_video_url' => ['nullable', 'max:255', 'string'],
            'business_type' => ['nullable', 'max:255', 'string'],
            'city' => ['nullable', 'max:255', 'string'],
            'district' => ['nullable', 'max:255', 'string'],
            'subdistrict' => ['nullable', 'max:255', 'string'],
            'tags' => ['nullable', 'max:255', 'json'],
            'source' => ['nullable', 'max:255', 'string'],
            'nib' => ['nullable', 'max:255', 'string'],
            'npwp' => ['nullable', 'max:255', 'string'],
            'no_akta' => ['nullable', 'max:255', 'string'],
            'siup' => ['nullable', 'max:255', 'string'],
            'other_certifications' => ['nullable', 'max:255', 'json'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $company = $numberOfEmployee->companies()->create($validated);

        return new CompanyResource($company);
    }
}
