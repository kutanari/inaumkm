<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'parent'];

    protected $searchableFields = ['*'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
