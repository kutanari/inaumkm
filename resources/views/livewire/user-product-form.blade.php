@php $editing = is_object($product) @endphp
<div>
    <x-form method="POST" wire:submit.prevent="saveProduct" action="{{ route('store-product') }}" class="mt-4">
        <div class="flex flex-wrap">
            <x-inputs.hidden id="company_id" name="company_id" :value="auth()->user()->company->id"></x-inputs.hidden>

            <x-inputs.group class="w-full">
                <x-inputs.text wire:model="name" name="name" label="Nama" :value="old('name', $editing ? $product->name : '')" maxlength="255" placeholder="Nama produk"
                    ></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group class="w-full">
                <x-inputs.textarea wire:model="description" name="description" label="Deskripsi" maxlength="255"
                    >{{ old('description', $editing ? $product->description : '') }}</x-inputs.textarea>
            </x-inputs.group>

            <div class="my-4 w-full">
                <span class="w-full text-gray-700 font-medium">Foto Produk</span>
                <div class="flex items-center justify-center w-full">
                    <label for="image_path"
                        class="relative overflow-hidden flex flex-col items-center justify-center w-full/3 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="z-30 flex flex-col items-center justify-center px-3 pt-5 pb-6 font-bold text-sm">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="drop-shadow mb-2 text-gray-500 dark:text-gray-400"><span class="">Pilih foto
                                    produk</span></p>
                            <p class="drop-shadow text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                250x250px) <br /> ukuran maximal file 1Mb / 1024 kilobytes</p>
                        </div>
                        @if (is_object($image_path))
                            <img class="absolute -z-1 items-center justify-center px-3 pt-5 pb-6"
                                src="{{ $image_path->temporaryUrl() }}">
                        @else
                            @if (!empty($image_path))
                                <img class="absolute -z-1 items-center justify-center px-3 pt-5 pb-6"
                                    src="{{ asset('storage/' . $image_path) }}">
                            @endif
                        @endif
                        <input id="image_path" type="file" wire:model="image_path" class="hidden" />
                    </label>
                </div>
                @error('image_path')
                    <div class="w-full text-center">
                        <span class="text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <x-inputs.group class="w-full">
                <x-inputs.select name="category_id" label="Kategori" wire:model="category_id">
                    @php $selected = old('category_id', ($editing ? $product->category_id : '')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Pilih kategori produk</option>
                    @foreach ($categories as $value => $label)
                        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </x-inputs.select>
            </x-inputs.group>
        </div>
        <div class="mt-10 flex flex-row w-full">
            <a href="{{ route('manage-product') }}"
                class="bg-primary-ina-red flex w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center">
                <i
                    class="
                        mr-1
                        icon
                        ion-md-return-left
                        text-primary
                    "></i>
                @lang('crud.common.back')
            </a>

            <button type="submit"
                class="ml-4 md:block flex bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center float-right">
                <i class="mr-1 icon ion-md-save"></i>
                Simpan
            </button>
        </div>
    </x-form>
</div>
