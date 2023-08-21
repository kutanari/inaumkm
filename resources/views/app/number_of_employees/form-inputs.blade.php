@php $editing = isset($numberOfEmployee) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="label"
            label="Label"
            :value="old('label', ($editing ? $numberOfEmployee->label : ''))"
            maxlength="255"
            placeholder="Label"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="min"
            label="Min"
            :value="old('min', ($editing ? $numberOfEmployee->min : ''))"
            maxlength="255"
            placeholder="Min"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="max"
            label="Max"
            :value="old('max', ($editing ? $numberOfEmployee->max : ''))"
            maxlength="255"
            placeholder="Max"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
