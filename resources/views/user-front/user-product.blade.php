<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Produk') }} <span class="text-sm underline float-right">
        </h2>
    </x-slot>
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
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex md:flex-row flex-col justify-between">
                        <div class="md:w-1/2 w-full hidden">
                            <form class="w-full">
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        class="py-2"
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class=" md:block flex text-right md:mt-0 md:text-rgiht mt-2 w-full">
                            @can('create', App\Models\Product::class)
                            <a
                                href="{{ route('create-product') }}"
                                class="bg-primary-ina-red w-full md:w-auto content-center text-center text-white rounded-md py-2 px-4 justify-center md:float-right"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                Tambahkan
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
                                    Nama
                                </th>
                                <th class="px-4 py-3 text-left">
                                    Deskripsi
                                </th>
                                <th class="px-4 py-3 text-left">
                                    Photo
                                </th>
                                <th class="px-4 py-3 text-left">
                                    Kategori
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $product->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $product->description ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if ($product->image_path)
                                    <div class="w-20">
                                        <img class="" src="{{ asset('storage/' . $product->image_path) }}">
                                    </div>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($product->category)->name ?? '-'
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
                                        @can('update', $product)
                                        <a
                                            href="{{ route('edit-product', $product) }}"
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
                                        @endcan @can('view', $product)
                                        <a
                                            href="{{ route('show-product', $product) }}"
                                            class="mr-1 hidden"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $product)
                                        <form
                                            action="{{ route('destroy-product', $product) }}"
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
                                <td colspan="7">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="mt-10 px-4">
                                        {{-- {!! $products->render() !!} --}}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
    <div class="sm:py-6 md:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
    </div>
</x-app-layout>