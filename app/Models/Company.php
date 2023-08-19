<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'name',
        'founder_name',
        'address',
        'latlong',
        'province',
        'description',
        'website_url',
        'slug',
        'contact_name',
        'contact_email',
        'contact_number',
        'established_year',
        'logo_picture',
        'profile_picture',
        'youtube_video_url',
        'business_type',
        'number_of_employee_id',
        'city',
        'district',
        'subdistrict',
        'tags',
        'source',
        'nib',
        'npwp',
        'no_akta',
        'siup',
        'other_certifications',
        'category_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tags' => 'array',
        'other_certifications' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function numberOfEmployee()
    {
        return $this->belongsTo(NumberOfEmployee::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
