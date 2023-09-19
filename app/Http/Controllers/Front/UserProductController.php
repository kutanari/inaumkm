<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Company;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\ProductCategory;
use Spatie\Permission\Models\Role;

class UserProductController extends Controller
{
    public function manage(Request $request): View
    {
        $search = $request->get('search', '');

        // $products = Product::search($search)
        //     ->latest()
        //     ->paginate(5)
        //     ->withQueryString();
        
        $products = auth()->user()->company->products;

        return view('user-front/user-product', compact('products', 'search'));
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = ProductCategory::pluck('name', 'id');
        
        return view('user-front/create-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }

        $storeRequest = new ProductStoreRequest;
        $validated = $request->validate($storeRequest->rules());
        
        $product = Product::create($validated);

        return redirect()
            ->route('manage-product', $product)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product): View
    {
        $this->authorize('view', $product);

        return view('user-front/show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product): View
    {
        $this->authorize('update', $product);

        $companies = Company::pluck('name', 'id');
        $categories = ProductCategory::pluck('name', 'id');

        return view(
            'user-front/edit-product',
            compact('product', 'companies', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductUpdateRequest $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('update', $product);

        $validated = $request->validated();

        $product->update($validated);

        return redirect()
            ->route('edit-product', $product)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()
            ->route('manage-product')
            ->withSuccess(__('crud.common.removed'));
    }
}
