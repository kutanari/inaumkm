<div>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
        {{-- @livewireStyles(['https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css']) --}}
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
        {{-- @livewireScripts(['https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js']) --}}
    @endpush

    <!--code for notification starts-->
    <div>
        @if ($errors->any())
            <x-partials.alert :isError="true" on="dataUpdated">
                Gagal menyimpan data, silahkan periksa kembali!
            </x-partials.alert>
        @endif 
        @if (session()->has('message'))
            <x-partials.alert :isError="false" on="dataUpdated">
                Sukses menyimpan data!
            </x-partials.alert>
            {{-- <div x-data="{ shown: true }" x-show="shown" :class="shown ? 'translateX(100%)' : 'translateX(0%)'"
                class="sm:mr-6 xl:w-1/4 mx-auto fixed top-5 z-40 left-0 sm:left-auto right-0 sm:w-6/12 md:w-1/3 justify-between w-11/12 bg-green-700 dark:bg-slate-400 text-white shadow-lg rounded sm:flex-row flex-col transition duration-150 ease-in-out "
                id="notification">
                <button aria-label="close" @click="shown = ! shown"
                    class="absolute right-0 mr-2 mt-2 text-white dark:text-gray-100 dark:hover:text-green-400 hover:text-green-400 transition duration-150 ease-in-out cursor-pointer focus:ring-2 focus:outline-none focus:ring-gray-500 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <div class="flex flex-col justify-center p-4">
                    <h1 class="text-lg text-green-300 dark:text-gray-100 font-semibold pb-1">Sukses mengubah data</h1>
                    <p class="text-sm text-white dark:text-gray-400 font-normal">{{ session('message') }}</p>
                </div>
            </div> --}}
        @endif
    </div>
    <!--code for notification ends-->
    <x-partials.card x-data="{persen_completness: $wire.persen_completness}" :class="'relative'">
        <h2 class="font-bold text-lg">Kelengkapan Profil Usaha</h2>
        Lengkapi informasi profil usaha anda
        <div class="absolute right-24 top-2">
            <div class="absolute">
                <div class="pie" style="--p:100;--c:rgb(235, 235, 235);--w:80px;--b:10px;"></div>
            </div>
            <div class="absolute">
                <div class="pie animate" style="--p:{{ $persen_completness }};--c:orange; --w:80px;--b:10px;">
                    <div class="text-center" x-data="{ current: 0, target: $wire.persen_completness, time: 1000}" x-init="() => {
                        setTimeout(function() {
                            start = current; 
                            const interval = Math.max(time / (target - start), 5); 
                            const step = (target - start) /  (time / interval);  
                            const handle = setInterval(() => {
                                if(current < target) 
                                    current += step
                                else {
                                    clearInterval(handle);
                                    current = target
                                }
                            }, interval)
                        }, 500)
                    }">
                        <div class="card text-sm" x-text="Math.round(current) + '%'" :x-text="$wire.persen_completness"></div>
                    </div>
                </div>
            </div>
        </div>
    </x-partials.card>
    <div x-data="{activeTab: $wire.activeTab}">
        <ul class="flex justify-center items-center my-4">
            @foreach ($tabs as $key => $tab)
            <li class="relative cursor-pointer py-2 px-4 text-gray-500 border-b-8 sm:relative" :class="activeTab == '{{$key}}' ? 'text-primary-ina-red border-primary-ina-red' : ''" @click="activeTab = '{{$key}}'">
                @if ($tab['cta'])
                    <span class="absolute right-0 md:-right-2 ml-2 inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                        <svg class="w-2 fill-red-600" viewBox="0 0 6 6" aria-hidden="true"><circle cx="3" cy="3" r="3"></circle></svg>
                    </span>
                @endif
                {{ $tab['label'] }}
                </li>
            @endforeach
        </ul>

        <x-partials.card>
            <div wire:loading wire:target="update" class="bg-black/50 absolute w-full h-full z-50 left-0 top-0 rounded-lg text-center text-white text-lg content-center">
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-primary-ina-red" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">menyimpan...</span>
                </div>
            </div>
            <x-form method="POST" wire:submit.prevent="update" action="{{ route('update-company') }}" class="mt-4">
                <div x-show="activeTab == 'info_profil'">
                    <div class="my-4 w-full">
                        <x-inputs.text name="name" label="Nama Usaha" wire:model="name" :value="old('name', $company->name)" maxlength="255"
                            placeholder="nama usaha"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="founder_name" label="Nama Pendiri" wire:model="founder_name" :value="old('founder_name', $company->founder_name)"
                            maxlength="255" placeholder="nama pendiri"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.textarea name="address" label="Alamat Usaha" wire:model="address"
                            maxlength="255">{{ old('address', $company->address) }}</x-inputs.textarea>
                    </div>

                    <div class="my-4 w-full" wire:ignore>
                        <x-inputs.hidden id="description" name="description" label="Deskripsi Usaha"
                            wire:model="description" :value="old('description', $company->description)"></x-inputs.hidden>
                        <trix-editor wire:ignore input="description" @trix-attachment-add="uploadImage($event)"
                        @trix-attachment-remove="removeAttachment($event)"></trix-editor>
                    </div>

                    <div class="my-4 w-full">
                        <x-inputs.select name="business_type" label="Jenis Usaha" wire:model="business_type">
                            @php $selected = old('business_type', $company->business_type) @endphp
                            <option value="" {{ empty($selected) ? 'selected' : '' }}>Pilih jenis usaha</option>
                            @foreach ($jenis_usaha as $value => $label)
                                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </div>

                    <div class="my-4 w-full">
                        <x-inputs.select name="category_id" label="Kategori" wire:model="category_id">
                            @php $selected = old('category_id', $company->category_id) @endphp
                            <option disabled value="" {{ empty($selected) ? 'selected' : '' }}>Pilih kategori usaha</option>
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </div>
                    <div class="my-4 w-full">
                        <x-inputs.select name="number_of_employee_id" label="Jumlah Karyawan"
                            wire:model="number_of_employee_id">
                            @php $selected = old('number_of_employee_id', $company->number_of_employee_id) @endphp
                            <option disabled value="" {{ empty($selected) ? 'selected' : '' }}>Silahkan pilih jumlah karyawan
                            </option>
                            @foreach ($nr_of_employee as $value => $label)
                                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </div>

                    <button type="submit" class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        Simpan
                    </button>
                </div>
                <div x-show="activeTab == 'picture_profile'">
                    
                    <div class="my-4 w-full">
                        <span class="w-full text-gray-700 font-medium">Gambar Logo</span>
                        <div class="flex items-center justify-center w-full">
                            <label for="logo_picture" class="relative overflow-hidden flex flex-col items-center justify-center w-full/3 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="z-30 flex flex-col items-center justify-center px-3 pt-5 pb-6 font-bold text-sm">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="drop-shadow mb-2 text-gray-500 dark:text-gray-400"><span class="">Pilih gambar untuk logo</span></p>
                                    <p class="drop-shadow text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 250x250px) <br/> ukuran maximal file 1Mb / 1024 kilobytes</p>
                                </div>
                                @if (is_object($logo_picture))
                                    <img class="absolute -z-1 items-center justify-center px-3 pt-5 pb-6" src="{{ $logo_picture->temporaryUrl() }}">
                                @else
                                    @if (! empty($logo_picture))
                                        <img class="absolute -z-1 items-center justify-center px-3 pt-5 pb-6" src="{{ asset('storage/' . $logo_picture) }}">
                                    @endif
                                @endif
                                <input id="logo_picture" type="file" wire:model="logo_picture" class="hidden" />
                            </label>
                        </div> 
                        @error('logo_picture')
                        <div class="w-full text-center">
                            <span class="text-red-600">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
    
                    <div class="my-4 w-full">
                        <span class="w-full text-gray-700 font-medium">Gambar Profil Usaha</span>
                        <div class="relative overflow-hidden flex items-center justify-center w-full">
                            <label for="profile_picture" class="relative overflow-hidden flex flex-col items-center justify-center w-full h-64 md:h-96 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="z-30 flex flex-col items-center justify-center pt-5 pb-6 font-bold text-sm">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="drop-shadow mb-2 text-gray-500 dark:text-gray-400"><span class="">Pilih gambar untuk company profile </span></p>
                                    <p class="drop-shadow text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1024x1024px)</p>
                                </div>
                                {{-- <source src=":value="old('profile_picture', $company->profile_picture)"" type=""> --}}
                                <input id="profile_picture" type="file" wire:model="profile_picture" class="hidden" />
                                @if (is_object($profile_picture))
                                    <img class="absolute items-center justify-center px-3 pt-5 pb-6" src="{{ $profile_picture->temporaryUrl() }}">
                                @else
                                    @if (! empty($profile_picture))
                                        <img class="absolute items-center justify-center px-3 pt-5 pb-6" src="{{ asset('storage/' . $profile_picture) }}">
                                    @endif
                                @endif
                            </label>
                        </div>
                        @error('profile_picture')
                        <div class="w-full text-center">
                            <span class="text-red-600">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="youtube_video_url" label="Video Usaha" wire:model="youtube_video_url"
                            :value="old('youtube_video_url', $company->youtube_video_url)" maxlength="255" placeholder="Tautan ke video youtube"></x-inputs.text>
                    </div>
    
                    {{-- <div class="my-4 w-full">
                        <x-inputs.textarea name="tags" label="Tags" wire:model="tags"
                            maxlength="255">{{ old('tags', json_encode($company->tags)) }}</x-inputs.textarea>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="source" label="Source" wire:model="source" :value="old('source', $company->source)"
                            maxlength="255" placeholder="Source"></x-inputs.text>
                    </div> --}}
                    <div class="my-4 w-full">
                        <span class="w-full text-gray-700 font-medium">Produk</span>
                        <div class="flex  w-full">
                            <a href="{{ route('manage-product') }}">
                                <div class="flex flex-col items-center justify-center w-full/3 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center text-center justify-center pt-5 pb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                          </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 p-4"><span class="font-semibold">Tambahkan produk untuk memperbagus company profile </span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <button type="submit" class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        Simpan
                    </button>
                </div>
                <div x-show="activeTab == 'contact_detail'">
                    <div class="my-4 w-full">
                        <x-inputs.text name="contact_name" label="Nama Kontak" wire:model="contact_name" :value="old('contact_name', $company->contact_name)"
                            maxlength="255" placeholder="nama kontak"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="contact_email" label="Alamat Email" wire:model="contact_email"
                            :value="old('contact_email', $company->contact_email)" maxlength="255" placeholder="email"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="contact_number" label="Nomor Kontak" wire:model="contact_number"
                            :value="old('contact_number', $company->contact_number)" maxlength="255" placeholder="nomor kontak"></x-inputs.text>
                    </div>

                    <div class="my-4 w-full">
                        <x-inputs.text name="website_url" label="Website Usaha" wire:model="website_url" :value="old('website_url', $company->website_url)"
                            maxlength="255" placeholder="https://domain.com"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.number name="established_year" label="Tahun Berdiri" wire:model="established_year"
                            :value="old('established_year', $company->established_year)" maxlength="255" placeholder="tahun berdiri"></x-inputs.number>
                    </div>

                    <div class="my-4 w-full">
                        <x-inputs.text name="province" label="Provinsi" wire:model="province" :value="old('province', $company->province)"
                            maxlength="255" placeholder="provinsi"></x-inputs.text>
                    </div>
                    
                    <div class="my-4 w-full">
                        <x-inputs.text name="city" label="Kota" wire:model="city" :value="old('city', $company->city)"
                            maxlength="255" placeholder="kota"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="district" label="Kecamatan" wire:model="district" :value="old('district', $company->district)"
                            maxlength="255" placeholder="kecamatan"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="subdistrict" label="Kelurahan" wire:model="subdistrict" :value="old('subdistrict', $company->subdistrict)"
                            maxlength="255" placeholder="kelurahan"></x-inputs.text>
                    </div>
                    
                    <button type="submit" class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        Simpan
                    </button>
                </div>
                <div x-show="activeTab == 'document'">
                    <div class="my-4 w-full">
                        <x-inputs.text name="nib" label="NIB" wire:model="nib" :value="old('nib', $company->nib)" maxlength="255"
                            placeholder="xxxxx"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="npwp" label="NPWP" wire:model="npwp" :value="old('npwp', $company->npwp)"
                            maxlength="255" placeholder="xxxx"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="no_akta" label="No. Akta" wire:model="no_akta" :value="old('no_akta', $company->no_akta)"
                            maxlength="255" placeholder="xxxxx"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.text name="siup" label="SIUP" wire:model="siup" :value="old('siup', $company->siup)"
                            maxlength="255" placeholder="xxxxx"></x-inputs.text>
                    </div>
    
                    <div class="my-4 w-full">
                        <x-inputs.textarea name="other_certifications" wire:model="other_certifications"
                            label="Sertifikat Lainnya"
                            maxlength="255">{{ old('other_certifications', json_encode($company->other_certifications)) }}</x-inputs.textarea>
                    </div>
                    <button type="submit" class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        Simpan
                    </button>
                </div>
            </x-form>
        </x-partials.card>
    </div>


    
            {{-- <x-form method="PUT" action="{{ route('update-company') }}" class="mt-4"> --}}
            <div class="flex flex-wrap">

                {{-- <div class="my-4 w-full">
                    <x-inputs.text name="latlong" label="Latlong" wire:model="latlong" :value="old('latlong', $company->latlong)" maxlength="255"
                        placeholder="Latlong"></x-inputs.text>
                </div> --}}

                {{-- <div class="my-4 w-full">
                    <x-inputs.text name="slug" label="Slug" :value="old('slug', $company->slug)" maxlength="255" placeholder="Slug"
                        required></x-inputs.text>
                </div> --}}

            </div>
    <script>
        var trixEditor = document.getElementById("description")

        addEventListener("trix-blur", function(event) {
            @this.set('description', trixEditor.getAttribute('value'))
        })

        var onHoldAttachments = [];
        function uploadImage(event) {
            @this.upload(
                'files',
                event.attachment.file,
                function(url) {
                    console.log(url);
                    onHoldAttachments.push(event.attachment);
                }
            )
        }
        function removeAttachment(event){
			@this.removeAttachments(event.attachment.attachment.previewURL);
        }

        function setup() {
            return {
                activeTab: 'info_profil',
                tabs: [
                    "Info Profil",
                    "Gambar Profil",
                    "Info Kontak",
                    "Dokumen Pendukung",
                ]
            };
        };
        @push('scripts')
            <script>
                Livewire.on('dataUpdated', percent => {
                    
                })
            </script>
        @endpush
    </script>
</div>
