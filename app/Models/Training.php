<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'batch',
        'details',
        'sylabus',
        'paper',
        'instructor',
    ];

    protected $searchableFields = ['*'];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
