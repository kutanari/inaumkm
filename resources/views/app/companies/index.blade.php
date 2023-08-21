<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.companies.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Company::class)
                            <a
                                href="{{ route('companies.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.user_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.founder_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.address')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.latlong')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.province')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.description')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.website_url')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.slug')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.contact_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.contact_email')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.contact_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.established_year')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.logo_picture')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.profile_picture')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.youtube_video_url')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.business_type')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.number_of_employee_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.city')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.district')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.subdistrict')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.tags')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.source')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.nib')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.npwp')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.no_akta')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.siup')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.other_certifications')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.companies.inputs.category_id')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($companies as $company)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ optional($company->user)->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->founder_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->address ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->latlong ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->province ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->description ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->website_url ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->slug ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->contact_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->contact_email ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->contact_number ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->established_year ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->logo_picture ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->profile_picture ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->youtube_video_url ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->business_type ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($company->numberOfEmployee)->label
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->city ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->district ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->subdistrict ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($company->tags) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->source ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->nib ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->npwp ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->no_akta ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $company->siup ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($company->other_certifications) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($company->category)->name ?? '-'
                                    }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $company)
                                        <a
                                            href="{{ route('companies.edit', $company) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $company)
                                        <a
                                            href="{{ route('companies.show', $company) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $company)
                                        <form
                                            action="{{ route('companies.destroy', $company) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="30">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="30">
                                    <div class="mt-10 px-4">
                                        {!! $companies->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
