@php $editing = isset($category) @endphp

<div class="flex flex-wrap">
    <x-inputs.hidden
        name="id"
        :value="old('id', ($editing ? $category->id : ''))"
        maxlength="255"
        placeholder="Id"
    ></x-inputs.hidden>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $category->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $category->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
