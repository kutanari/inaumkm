@php $editing = isset($company) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $company->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $company->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="founder_name"
            label="Founder Name"
            :value="old('founder_name', ($editing ? $company->founder_name : ''))"
            maxlength="255"
            placeholder="Founder Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="address" label="Address" maxlength="255"
            >{{ old('address', ($editing ? $company->address : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="latlong"
            label="Latlong"
            :value="old('latlong', ($editing ? $company->latlong : ''))"
            maxlength="255"
            placeholder="Latlong"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="province"
            label="Province"
            :value="old('province', ($editing ? $company->province : ''))"
            maxlength="255"
            placeholder="Province"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $company->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="website_url"
            label="Website Url"
            :value="old('website_url', ($editing ? $company->website_url : ''))"
            maxlength="255"
            placeholder="Website Url"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="slug"
            label="Slug"
            :value="old('slug', ($editing ? $company->slug : ''))"
            maxlength="255"
            placeholder="Slug"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_name"
            label="Contact Name"
            :value="old('contact_name', ($editing ? $company->contact_name : ''))"
            maxlength="255"
            placeholder="Contact Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_email"
            label="Contact Email"
            :value="old('contact_email', ($editing ? $company->contact_email : ''))"
            maxlength="255"
            placeholder="Contact Email"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_number"
            label="Contact Number"
            :value="old('contact_number', ($editing ? $company->contact_number : ''))"
            maxlength="255"
            placeholder="Contact Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="established_year"
            label="Established Year"
            :value="old('established_year', ($editing ? $company->established_year : ''))"
            maxlength="255"
            placeholder="Established Year"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="logo_picture"
            label="Logo Picture"
            :value="old('logo_picture', ($editing ? $company->logo_picture : ''))"
            maxlength="255"
            placeholder="Logo Picture"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="profile_picture"
            label="Profile Picture"
            :value="old('profile_picture', ($editing ? $company->profile_picture : ''))"
            maxlength="255"
            placeholder="Profile Picture"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="youtube_video_url"
            label="Youtube Video Url"
            :value="old('youtube_video_url', ($editing ? $company->youtube_video_url : ''))"
            maxlength="255"
            placeholder="Youtube Video Url"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="business_type"
            label="Business Type"
            :value="old('business_type', ($editing ? $company->business_type : 'pt'))"
            maxlength="255"
            placeholder="Business Type"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="number_of_employee_id"
            label="Number Of Employee"
        >
            @php $selected = old('number_of_employee_id', ($editing ? $company->number_of_employee_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Number Of Employee</option>
            @foreach($numberOfEmployees as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $company->city : ''))"
            maxlength="255"
            placeholder="City"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="district"
            label="District"
            :value="old('district', ($editing ? $company->district : ''))"
            maxlength="255"
            placeholder="District"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="subdistrict"
            label="Subdistrict"
            :value="old('subdistrict', ($editing ? $company->subdistrict : ''))"
            maxlength="255"
            placeholder="Subdistrict"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="tags" label="Tags" maxlength="255"
            >{{ old('tags', ($editing ? json_encode($company->tags) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="source"
            label="Source"
            :value="old('source', ($editing ? $company->source : ''))"
            maxlength="255"
            placeholder="Source"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nib"
            label="Nib"
            :value="old('nib', ($editing ? $company->nib : ''))"
            maxlength="255"
            placeholder="Nib"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="npwp"
            label="Npwp"
            :value="old('npwp', ($editing ? $company->npwp : ''))"
            maxlength="255"
            placeholder="Npwp"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="no_akta"
            label="No Akta"
            :value="old('no_akta', ($editing ? $company->no_akta : ''))"
            maxlength="255"
            placeholder="No Akta"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="siup"
            label="Siup"
            :value="old('siup', ($editing ? $company->siup : ''))"
            maxlength="255"
            placeholder="Siup"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="other_certifications"
            label="Other Certifications"
            maxlength="255"
            >{{ old('other_certifications', ($editing ?
            json_encode($company->other_certifications) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="category_id" label="Category">
            @php $selected = old('category_id', ($editing ? $company->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Category</option>
            @foreach($categories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
