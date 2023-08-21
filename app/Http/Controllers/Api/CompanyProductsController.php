<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class CompanyProductsController extends Controller
{
    public function index(Request $request, Company $company): ProductCollection
    {
        $this->authorize('view', $company);

        $search = $request->get('search', '');

        $products = $company
            ->products()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductCollection($products);
    }

    public function store(Request $request, Company $company): ProductResource
    {
        $this->authorize('create', Product::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'image_path' => ['required', 'max:255', 'string'],
            'slug' => ['required', 'max:255', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $product = $company->products()->create($validated);

        return new ProductResource($product);
    }
}
