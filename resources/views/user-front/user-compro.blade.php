<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-gray-300 print:bg-white" ">
    {{-- <page size="A4" class="">
        
    </page> --}}
    <page size="A4" id="printableArea" class="print:m-0 print:p-0">
        <div class="h-full">
            <div class="rounded-lg pb-0">
                <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded print:hidden">
                    <button @click="openSettings = !openSettings" class="border border-blue-500 p-2 rounded text-blue-500 hover:text-blue-800 bg-gray-100" title="Settings">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-black" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                    <div x-show="openSettings" @click.away="openSettings = false" class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl" style="display: none;">
                        <div class="py-2 border-b">
                            <p class="text-gray-400 text-xs px-6 uppercase mb-1">Pilih Tema</p>
                            <a class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200" href="{{ route('preview-compro', '1') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                                    <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z"/>
                                    <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z"/>
                                </svg>
                                <span class="text-sm text-gray-700">Tema 1</span>
                            </a>
                            <a class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200" href="{{ route('preview-compro', '2') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                                    <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z"/>
                                    <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z"/>
                                </svg>
                                <span class="text-sm text-gray-700">Tema 2</span>
                            </a>
                            <a class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200" href="{{ route('preview-compro', '3') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                                    <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z"/>
                                    <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z"/>
                                </svg>
                                <span class="text-sm text-gray-700">Tema 3</span>
                            </a>
                        </div>
                        <div class="py-2">
                            <p class="text-gray-400 text-xs px-6 uppercase mb-1">Bantuan</p>
                            <a class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200" href="/user/company">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                </svg>
                                <span class="text-sm text-gray-700">Keluar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="absolute">
                    <a class="w-full bg-lime-600 text-white flex items-center py-1.5 px-6 space-x-2 shadow-md print:hidden rounded-sm" href="/user/company">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        <span class="text-sm text-white">Kebali</span>
                    </a>
                </div>
                <div class="w-full h-full">
                    @if (! empty($company->profile_picture))
                    <img src="{{ asset('storage/' . $company->profile_picture) }}" class="w-full h-full rounded-tl-lg rounded-tr-lg">
                    @endif
                </div>
                <div class="flex flex-col items-center -mt-80 mb-8 text-white">
                    @if (! empty($company->logo_picture))
                    <img src="{{ asset('storage/' . $company->logo_picture) }}" class="w-40 border-4 border-white rounded-full">
                    @endif
                    <div class="flex items-center space-x-2 mt-2">
                        <p class="text-2xl text-white text-border">{{ $company->name }}</p>
                        <span class="bg-blue-500 rounded-full p-1" title="Verified">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    </div>
                    @if (! empty($company->contact_number))
                        <p class=" text-white text-border">{{ $company->contact_number }}</p>
                    @endif
                    @if (! empty($company->address) )
                        <p class="text-sm text-white text-border text-center">{{ $company->address }} @if (!empty($company->city))<br/>{{ $company->city }}@endif @if(!empty($company->province)), {{ $company->province }}@endif</p>
                    @endif
                    @if (! empty($company->established_year))
                        <p class="text-sm text-white text-border">Berdiri sejak {{ $company->established_year }}</p>
                    @endif
                </div>
                <div class="relative">
                    <div class="absolute right-0 flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2 print:hidden">
                        <div class="flex items-center space-x-4 mt-2">
                            <button onclick="printableDiv('printableArea')" class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                  </svg>
                                <span>Cetak</span>
                            </button>
                            <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg>
                                <span>Unduh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col 2xl:flex-col space-y-4 2xl:space-y-0">
                <div class="flex flex-col w-full">
                    <div class="flex-1 bg-white rounded-lg p-8">
                        <h4 class="text-xl text-gray-900 font-bold">Latar Belakang Usaha</h4>
                        <p>
                            Di dirikan sejak tahun {{ $company->established_year }} oleh pendiri kami bapak/ibu <span class="font-semibold">{{ $company->founder_name }}</span>
                        </p>
                        <p class="mt-2 text-gray-700">
                            {!! $company->description !!}
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-col">
                    <div class="flex-1 bg-white rounded-lg px-8 pb-8 print:p-8">
                        <h4 class="text-xl text-gray-900 font-bold">Skala Usaha</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="flex border-y py-2">
                                <span class="font-bold w-44">Jenis Usaha</span>
                                <span class="text-gray-700">{{ $jenis_usaha[$company->business_type] }}</span>
                            </li>
                            <li class="flex border-y py-2">
                                <span class="font-bold w-44">Jumlah Karyawan</span>
                                <span class="text-gray-700">
                                    @if (isset($nr_of_employee->toArray()[$company->number_of_employee_id]))
                                        {{ $nr_of_employee->toArray()[$company->number_of_employee_id] }}
                                    @endif
                                </span>
                            </li>
                            <li class="flex border-y py-2">
                                <span class="font-bold w-44">Kategori Usaha</span>
                                <span class="text-gray-700">
                                    @if (isset($categories->toArray()[$company->category_id]))
                                        {{ $categories->toArray()[$company->category_id] }}
                                    @endif
                                </span>
                            </li>
                            <li class="flex border-y py-2">
                                <span class="font-bold w-44">Dokumen Pendukung</span>
                                <span class="text-gray-700">
                                    @if(! empty($company->npwp))
                                        <span class="flex items-center pr-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-blue-600 bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                            <span>NPWP</span>
                                        </span>
                                    @endif
                                    @if(! empty($company->nib))
                                        <span class="flex items-center pr-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-blue-600 bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                            <span>NIB</span>
                                        </span>
                                    @endif
                                    @if(! empty($company->no_akta))
                                        <span class="flex items-center pr-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-blue-600 bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                            <span>Akta Pendirian Usaha</span>
                                        </span>
                                    @endif
                                    @if(! empty($company->siup))
                                        <span class="flex items-center pr-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-blue-600 bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                            <span>SIUP</span>
                                        </span>
                                    @endif
                                    @if(! empty($company->other_certifications))
                                        <span class="flex items-center  px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-blue-600 bi bi-bookmark-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                            </svg>
                                            <span>{{ $company->other_certifications }}</span>
                                        </span>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full flex flex-col">
                    <div class="flex-1 bg-white rounded-lg px-8 pb-8">
                        <h4 class="text-xl text-gray-900 font-bold">Hubungi Kami</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="flex border-y py-2">
                                <span class="font-bold w-32">Nama Kontak</span>
                                <span class="text-gray-700">{{ $company->contact_name }}</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-32">No. Telpon</span>
                                <span class="text-gray-700">{{ $company->contact_number }}</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-32">Email</span>
                                <span class="text-gray-700">{{ $company->contact_email }}</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-32">Alamat:</span>
                                <span class="text-gray-700">
                                    {{ $company->address }}<br/>
                                    {{ collect([$company->subdistrict, $company->district, $company->city])->join(', ') }}<br/>
                                    {{ $company->province }}
                                </span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-32">Website:</span>
                                <span class="text-gray-700">{{ $company->website_url }}</span>
                            </li>
                            <li class="flex items-center border-b py-2 space-x-2 hidden">
                                <span class="font-bold w-32">Elsewhere:</span>
                                <a href="#" title="Facebook">
                                    <svg class="w-5 h-5" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 506.86 506.86"><defs><style>.cls-1{fill:#1877f2;}.cls-2{fill:#fff;}</style></defs><path class="cls-1" d="M506.86,253.43C506.86,113.46,393.39,0,253.43,0S0,113.46,0,253.43C0,379.92,92.68,484.77,213.83,503.78V326.69H149.48V253.43h64.35V197.6c0-63.52,37.84-98.6,95.72-98.6,27.73,0,56.73,5,56.73,5v62.36H334.33c-31.49,0-41.3,19.54-41.3,39.58v47.54h70.28l-11.23,73.26H293V503.78C414.18,484.77,506.86,379.92,506.86,253.43Z"></path><path class="cls-2" d="M352.08,326.69l11.23-73.26H293V205.89c0-20,9.81-39.58,41.3-39.58h31.95V104s-29-5-56.73-5c-57.88,0-95.72,35.08-95.72,98.6v55.83H149.48v73.26h64.35V503.78a256.11,256.11,0,0,0,79.2,0V326.69Z"></path></svg>
                                </a>
                                <a href="#" title="Twitter">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm90493 110539c-6654 2976-13822 4953-21307 5835 7669-4593 13533-11870 16333-20535-7168 4239-15133 7348-23574 9011-6787-7211-16426-11694-27105-11694-20504 0-37104 16610-37104 37101 0 2893 320 5722 949 8450-30852-1564-58204-16333-76513-38806-3285 5666-5022 12109-5022 18661v4c0 12866 6532 24246 16500 30882-6083-180-11804-1876-16828-4626v464c0 17993 12789 33007 29783 36400-3113 845-6400 1313-9786 1313-2398 0-4709-247-7007-665 4746 14736 18448 25478 34673 25791-12722 9967-28700 15902-46120 15902-3006 0-5935-184-8860-534 16466 10565 35972 16684 56928 16684 68271 0 105636-56577 105636-105632 0-1630-36-3209-104-4806 7251-5187 13538-11733 18514-19185l17-17-3 2z" fill="#1da1f2"></path></svg>
                                </a>
                                <a href="#" title="LinkedIn">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm-18220 138885h28897v14814l418 1c4024-7220 13865-14814 28538-14814 30514-1 36157 18989 36157 43691v50320l-30136 1v-44607c0-10634-221-24322-15670-24322-15691 0-18096 11575-18096 23548v45382h-30109v-94013zm-20892-26114c0 8650-7020 15670-15670 15670s-15672-7020-15672-15670 7022-15670 15672-15670 15670 7020 15670 15670zm-31342 26114h31342v94013H96213v-94013z" fill="#0077b5"></path></svg>
                                </a>
                                <a href="#" title="Github">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="0" height="0" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640"><path d="M319.988 7.973C143.293 7.973 0 151.242 0 327.96c0 141.392 91.678 261.298 218.826 303.63 16.004 2.964 21.886-6.957 21.886-15.414 0-7.63-.319-32.835-.449-59.552-89.032 19.359-107.8-37.772-107.8-37.772-14.552-36.993-35.529-46.831-35.529-46.831-29.032-19.879 2.209-19.442 2.209-19.442 32.126 2.245 49.04 32.954 49.04 32.954 28.56 48.922 74.883 34.76 93.131 26.598 2.882-20.681 11.15-34.807 20.315-42.803-71.08-8.067-145.797-35.516-145.797-158.14 0-34.926 12.52-63.485 32.965-85.88-3.33-8.078-14.291-40.606 3.083-84.674 0 0 26.87-8.61 88.029 32.8 25.512-7.075 52.878-10.642 80.056-10.76 27.2.118 54.614 3.673 80.162 10.76 61.076-41.386 87.922-32.8 87.922-32.8 17.398 44.08 6.485 76.631 3.154 84.675 20.516 22.394 32.93 50.953 32.93 85.879 0 122.907-74.883 149.93-146.117 157.856 11.481 9.921 21.733 29.398 21.733 59.233 0 42.792-.366 77.28-.366 87.804 0 8.516 5.764 18.473 21.992 15.354 127.076-42.354 218.637-162.274 218.637-303.582 0-176.695-143.269-319.988-320-319.988l-.023.107z"></path></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex flex-col w-full">
                    <div class="flex-1 bg-white rounded-lg px-8 pb-8">
                        <h4 class="text-xl text-gray-900 font-bold">Produk</h4>
                        <div class="grid gap-x-6 grid-cols-3">
                            @foreach ($company->products as $product)
                            <div class="">
                                <div
                                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <div class="relative overflow-hidden bg-cover bg-no-repeat">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full rounded-t-lg" />
                                    <a href="#!">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed"></div>
                                    </a>
                                </div>
                                <div class="p-6">
                                    <h5 class="mb-4 text-lg font-bold">{{ $product->name }}</h5>
                                    <p class="mb-4 text-neutral-500 dark:text-neutral-300">{{ $product->description }}</p>
                                </div>
                                </div>
                            </div>
                            @endforeach($company->products)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </page>
    @livewireScripts
        <script>
            function printableDiv(printableAreaDivId) {
                var printContents = document.getElementById(printableAreaDivId).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
</body>
</html>