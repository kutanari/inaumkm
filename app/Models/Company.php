<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Company extends Model
{
    use HasFactory;
    use Searchable;
    use Sluggable;

    public static $jenis_usaha = [
        'pt' => 'Perseroan Terbatas (PT)',
        'cv' => 'Persekutuan Komanditer (CV)',
        'perseorangan' => 'Non Badan Usaha (Perseorangan)',
        'koperasi' => 'Koperasi',
        'bumd' => 'Badan Usaha Milik Daerah (BUMD)',
        'lainnya' => 'Lainnya',
    ];

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

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getPercenCompletness(Company $company): int
    {
        $nr_total_field = 19;
        $complete = 0;
        
        if ( ! empty($company->name) ) $complete++;
        if ( ! empty($company->founder_name) ) $complete++;
        if ( ! empty($company->address) ) $complete++;
        if ( ! empty($company->description) ) $complete++;
        if ( ! empty($company->category_id) ) $complete++;
        if ( ! empty($company->business_type) ) $complete++;
        if ( ! empty($company->number_of_employee_id) ) $complete++;

        if ( ! empty($company->logo_picture) ) $complete++;
        if ( ! empty($company->profile_picture) ) $complete++;

        if ( ! empty($company->contact_name) ) $complete++;
        if ( ! empty($company->contact_email) ) $complete++;
        if ( ! empty($company->contact_number) ) $complete++;
        if ( ! empty($company->city) ) $complete++;
        if ( ! empty($company->district) ) $complete++;
        if ( ! empty($company->subdistrict) ) $complete++;
        if ( ! empty($company->established_year) ) $complete++;
        
        if ( ! empty($company->nib) ) $complete++;
        if ( ! empty($company->no_akta) ) $complete++;
        if ( ! empty($company->siup) ) $complete++;

        return ($complete / $nr_total_field) * 100;
    }
}
