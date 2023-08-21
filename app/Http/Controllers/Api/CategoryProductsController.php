<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class CategoryProductsController extends Controller
{
    public function index(
        Request $request,
        Category $category
    ): ProductCollection {
        $this->authorize('view', $category);

        $search = $request->get('search', '');

        $products = $category
            ->products()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductCollection($products);
    }

    public function store(Request $request, Category $category): ProductResource
    {
        $this->authorize('create', Product::class);

        $validated = $request->validate([
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'image_path' => ['required', 'max:255', 'string'],
            'slug' => ['required', 'max:255', 'string'],
        ]);

        $product = $category->products()->create($validated);

        return new ProductResource($product);
    }
}
