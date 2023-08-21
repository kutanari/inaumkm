<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.companies.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('companies.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.user_id')
                        </h5>
                        <span>{{ optional($company->user)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.name')
                        </h5>
                        <span>{{ $company->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.founder_name')
                        </h5>
                        <span>{{ $company->founder_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.address')
                        </h5>
                        <span>{{ $company->address ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.latlong')
                        </h5>
                        <span>{{ $company->latlong ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.province')
                        </h5>
                        <span>{{ $company->province ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.description')
                        </h5>
                        <span>{{ $company->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.website_url')
                        </h5>
                        <span>{{ $company->website_url ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.slug')
                        </h5>
                        <span>{{ $company->slug ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.contact_name')
                        </h5>
                        <span>{{ $company->contact_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.contact_email')
                        </h5>
                        <span>{{ $company->contact_email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.contact_number')
                        </h5>
                        <span>{{ $company->contact_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.established_year')
                        </h5>
                        <span>{{ $company->established_year ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.logo_picture')
                        </h5>
                        <span>{{ $company->logo_picture ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.profile_picture')
                        </h5>
                        <span>{{ $company->profile_picture ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.youtube_video_url')
                        </h5>
                        <span>{{ $company->youtube_video_url ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.business_type')
                        </h5>
                        <span>{{ $company->business_type ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.number_of_employee_id')
                        </h5>
                        <span
                            >{{ optional($company->numberOfEmployee)->label ??
                            '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.city')
                        </h5>
                        <span>{{ $company->city ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.district')
                        </h5>
                        <span>{{ $company->district ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.subdistrict')
                        </h5>
                        <span>{{ $company->subdistrict ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.tags')
                        </h5>
                        <pre>{{ json_encode($company->tags) ?? '-' }}</pre>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.source')
                        </h5>
                        <span>{{ $company->source ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.nib')
                        </h5>
                        <span>{{ $company->nib ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.npwp')
                        </h5>
                        <span>{{ $company->npwp ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.no_akta')
                        </h5>
                        <span>{{ $company->no_akta ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.siup')
                        </h5>
                        <span>{{ $company->siup ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.other_certifications')
                        </h5>
                        <pre>
{{ json_encode($company->other_certifications) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.companies.inputs.category_id')
                        </h5>
                        <span
                            >{{ optional($company->category)->name ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('companies.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Company::class)
                    <a href="{{ route('companies.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
