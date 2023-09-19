<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Company;
use App\Models\NumberOfEmployee;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class UserCompanyForm extends Component
{
    use WithFileUploads;
    public Company $company;
    public Collection $nr_of_employee;
    public Collection $categories;
    public array $jenis_usaha;
    public string $activeTab = 'info_profil';
    public array $tabs = [
        'info_profil' => [
            'label' => "Info Profil",
            'cta' => false
        ],
        'picture_profile' => [
            'label' => "Gambar Profil",
            'cta' => false
        ],
        'contact_detail' => [
            'label' => "Info Kontak",
            'cta' => false
        ],
        'document' => [
            'label' => "Dokument Pendukung",
            'cta' => false
        ],
    ];

    public $name;
    public $founder_name;
    public $address;
    public $latlong;
    public $province;
    public $description;
    public $website_url;
    public $slug;
    public $contact_name;
    public $contact_email;
    public $contact_number;
    public $established_year;
    public $logo_picture;
    public $profile_picture;
    public $youtube_video_url;
    public $business_type;
    public $number_of_employee_id;
    public $city;
    public $district;
    public $subdistrict;
    public $tags;
    public $source;
    public $nib;
    public $npwp;
    public $no_akta;
    public $siup;
    public $other_certifications;
    public $category_id;

    public $persen_completness;

    /** var array \LiveWire\TemporaryUploadFile[] */
    public $files = [];

    private function updateTab()
    {
        /** @var \App\Models\Company $company */
        $company = $this->company;
        if ( empty($company->name) || empty($company->founder_name) || empty($company->address) || empty($company->description)
        || empty($company->category_id) || empty($company->business_type) || empty($company->number_of_employee_id) ) {
            $this->tabs['info_profil']['cta'] = true;
        } else {
            $this->tabs['info_profil']['cta'] = false;
        }

        if ( empty($company->logo_picture) || empty($company->profile_picture) ) {
            $this->tabs['picture_profile']['cta'] = true;
        } else {
            $this->tabs['picture_profile']['cta'] = false;
        }

        if ( empty($company->contact_name) || empty($company->contact_email) || empty($company->contact_number) || empty($company->city)
        || empty($company->district) || empty($company->subdistrict) || empty($company->established_year) ) {
            $this->tabs['contact_detail']['cta'] = true;
        } else {
            $this->tabs['contact_detail']['cta'] = false;
        }
        
        if ( empty($company->nib) || empty($company->no_akta) || empty($company->siup) ) {
            $this->tabs['document']['cta'] = true;
        } else {
            $this->tabs['document']['cta'] = false;
        }

        $this->persen_completness = Company::getPercenCompletness($this->company);
    }

    public function booted()
    {
        $this->updateTab();
    }
    
    public function updated()
    {
        $this->updateTab();
    }

    public function mount()
    {
        $this->name = $this->company->name;
        $this->founder_name = $this->company->founder_name;
        $this->address = $this->company->address;
        $this->latlong = $this->company->latlong;
        $this->province = $this->company->province;
        $this->description = $this->company->description;
        $this->website_url = $this->company->website_url;
        $this->slug = $this->company->slug;
        $this->contact_name = $this->company->contact_name;
        $this->contact_email = $this->company->contact_email;
        $this->contact_number = $this->company->contact_number;
        $this->established_year = $this->company->established_year;
        $this->logo_picture = $this->company->logo_picture;
        $this->profile_picture = $this->company->profile_picture;
        $this->youtube_video_url = $this->company->youtube_video_url;
        $this->business_type = $this->company->business_type;
        $this->number_of_employee_id = $this->company->number_of_employee_id;
        $this->city = $this->company->city;
        $this->district = $this->company->district;
        $this->subdistrict = $this->company->subdistrict;
        $this->tags = $this->company->tags;
        $this->source = $this->company->source;
        $this->nib = $this->company->nib;
        $this->npwp = $this->company->npwp;
        $this->no_akta = $this->company->no_akta;
        $this->siup = $this->company->siup;
        $this->other_certifications = $this->company->other_certifications;
        $this->category_id = $this->company->category_id;
    }

    public function render()
    {
        return view('livewire.user-company-form');
    }

    public function updatedLogoPicture()
    {
        $this->validate([
            'logo_picture' => 'image|max:1024' //2MB max
        ]);
    }

    public function updatedProfilePicture()
    {
        $this->validate([
            'profile_picture' => 'image|max:2048' //2MB max
        ]);
    }

    public function update()
    {
        $this->company->name = $this->name;
        $this->company->founder_name = $this->founder_name;
        $this->company->address = $this->address;
        $this->company->latlong = $this->latlong;
        $this->company->province = $this->province;
        $this->company->description = $this->description;
        $this->company->website_url = $this->website_url;
        $this->company->slug = SlugService::createSlug(Company::class, 'slug', $this->name);
        $this->company->contact_name = $this->contact_name;
        $this->company->contact_email = $this->contact_email;
        $this->company->contact_number = $this->contact_number;
        $this->company->established_year = $this->established_year;
        $this->company->logo_picture = $this->logo_picture;
        $this->company->profile_picture = $this->profile_picture;
        $this->company->youtube_video_url = $this->youtube_video_url;
        $this->company->business_type = $this->business_type;
        $this->company->number_of_employee_id = $this->number_of_employee_id;
        $this->company->city = $this->city;
        $this->company->district = $this->district;
        $this->company->subdistrict = $this->subdistrict;
        $this->company->tags = $this->tags;
        $this->company->source = $this->source;
        $this->company->nib = $this->nib;
        $this->company->npwp = $this->npwp;
        $this->company->no_akta = $this->no_akta;
        $this->company->siup = $this->siup;
        $this->company->other_certifications = $this->other_certifications;
        $this->company->category_id = $this->category_id;
        
        $rules['contact_email'] = ['nullable','email'];

        if ( is_object($this->logo_picture) ) {
            $rules['logo_picture'] = ['nullable', 'image', 'max:1024']; //1MB max
        }
        
        if ( is_object($this->profile_picture) ) {
            $rules['profile_picture'] = ['nullable', 'image', 'max:2048']; //1MB max
        }

        // dd($this->files);

        $this->validate($rules);

        if ( is_object($this->logo_picture) ) {
            $file = explode('.', $this->logo_picture->getFileName());
            $file_name = sprintf('%s.%s', $this->company->id, $file[count($file) - 1]);
            $file_path = $this->logo_picture->storeAs('/pictures/logo', $file_name, 'public');
            $this->company->logo_picture = $file_path;
        }

        if ( is_object($this->profile_picture) ) {
            $file = explode('.', $this->profile_picture->getFileName());
            $file_name = sprintf('%s.%s', $this->company->id, $file[count($file) - 1]);
            $file_path = $this->profile_picture->storeAs('/public/pictures/profile', $file_name, 'public');
            $this->company->profile_picture = $file_path;
        }
        
        $this->updateTab();
        $this->company->save();

        session()->flash('message', 'Perubahan berhasil !');
        $this->emit('dataUpdated', $this->persen_completness);
        // $this->emitSelf('postAdded');
        // return redirect()
        //     ->route('user-company', $this->company);
            // ->withSuccess(__('Data berhasil tersimpan'));
    }

    public function updatedDescription($description)
    {
        $this->company->description = $description;
        $this->company->save();
    }

    public function removeAttachments(string $url)
    {

    } 
}
