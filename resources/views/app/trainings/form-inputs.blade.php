@php $editing = isset($training) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $training->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="batch"
            label="Batch"
            :value="old('batch', ($editing ? $training->batch : ''))"
            maxlength="255"
            placeholder="Batch"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="details" label="Details" maxlength="255"
            >{{ old('details', ($editing ? $training->details : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="sylabus"
            label="Sylabus"
            :value="old('sylabus', ($editing ? $training->sylabus : ''))"
            maxlength="255"
            placeholder="Sylabus"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="paper"
            label="Paper"
            :value="old('paper', ($editing ? $training->paper : ''))"
            maxlength="255"
            placeholder="Paper"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="instructor"
            label="Instructor"
            :value="old('instructor', ($editing ? $training->instructor : ''))"
            maxlength="255"
            placeholder="Instructor"
        ></x-inputs.text>
    </x-inputs.group>
</div>
