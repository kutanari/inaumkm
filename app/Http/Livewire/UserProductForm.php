<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\RedirectResponse;

class UserProductForm extends Component
{
    use WithFileUploads;

    /**var Product $product */
    public $product;
    public $image_path;
    public $slug;
    public $name;
    public $description;
    public $category_id;
    public $company_id;
    public $is_edit = false;

    public function render()
    {
        $categories = ProductCategory::pluck('name', 'id');
        $product = $this->product;

        return view('livewire.user-product-form', compact('categories', 'product'));
    }

    public function mount()
    {
        $this->company_id = auth()->user()->company->id;
        if (is_object($this->product)) {
            $this->name = $this->product->name;
            $this->description = $this->product->description;
            $this->category_id = $this->product->category_id;
            $this->image_path = $this->product->image_path;
        }
    }

    public function updatedImagePath()
    {
        $this->validate([
            'image_path' => 'image|max:1024' //2MB max
        ]);
    }

    public function saveProduct()
    {
        
        $rules['name'] = ['required', 'max:255', 'string'];
        $rules['description'] = ['required', 'max:255', 'string'];
        $rules['category_id'] = ['required', 'exists:product_categories,id'];
        
        if ( is_object($this->image_path) ) {
            $rules['image_path'] = ['nullable', 'image', 'max:1024']; //1MB max
        }
        
        $this->validate($rules);

        if (! is_object($this->product) ) {
            $this->product = new Product;
        }
        
        $this->product->name = $this->name;
        $this->product->slug = SlugService::createSlug(Product::class, 'slug', $this->name);
        $this->product->description = $this->description;
        $this->product->company_id = $this->company_id;
        $this->product->category_id = $this->category_id;
        $this->product->image_path = $this->image_path;

        $this->product->save();

        if ( is_object($this->image_path) ) {
            $file = explode('.', $this->image_path->getFileName());
            $file_name = sprintf('%s/%s.%s', $this->company_id, $this->product->id, $file[count($file) - 1]);
            $file_path = $this->image_path->storeAs('/pictures/products', $file_name, 'public');
            $this->product->image_path = $file_path;
            $this->product->save();
        }

        session()->flash('message', 'Berhasil menyimpan data !');
 
        return redirect()->to('/user/product');
    }

}
