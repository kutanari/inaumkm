@php $editing = isset($product) @endphp

<div class="flex flex-wrap">
    <x-inputs.hidden id="company_id" name="company_id" :value="auth()->user()->company->id"></x-inputs.hidden>

    <x-inputs.group class="w-full">
        <x-inputs.text name="name" label="Nama" :value="old('name', $editing ? $product->name : '')" maxlength="255" placeholder="Nama produk"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="description" label="Deskripsi" maxlength="255"
            required>{{ old('description', $editing ? $product->description : '') }}</x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="w-full" x-data="{ filePath: '{{ old('image_path', $editing ? $product->image_path : '') }}'}">
        <div class="mb-3">
            <label for="image" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Photo</label>
            <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" type="file" id="image" name="image" x-model="filePath" />
        <x-inputs.hidden id="image_path" name="image_path" x-value="filePath" :value="old('image_path', $editing ? $product->image_path : '')"></x-inputs.hidden>
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="category_id" label="Kategori" required>
            @php $selected = old('category_id', ($editing ? $product->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Category</option>
            @foreach ($categories as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
