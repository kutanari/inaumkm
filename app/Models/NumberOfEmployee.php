<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NumberOfEmployee extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['label', 'min', 'max'];

    protected $searchableFields = ['*'];

    protected $table = 'number_of_employees';

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
