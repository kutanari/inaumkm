<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(255),
            'founder_name' => $this->faker->text(255),
            'address' => $this->faker->text(),
            'latlong' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'description' => $this->faker->text(),
            'website_url' => $this->faker->text(255),
            'slug' => $this->faker->unique->slug(),
            'contact_name' => $this->faker->text(255),
            'contact_email' => $this->faker->text(255),
            'contact_number' => $this->faker->text(255),
            'established_year' => $this->faker->text(255),
            'logo_picture' => $this->faker->text(255),
            'profile_picture' => $this->faker->text(255),
            'youtube_video_url' => $this->faker->text(255),
            'business_type' => $this->faker->text(255),
            'city' => $this->faker->city(),
            'district' => $this->faker->text(255),
            'subdistrict' => $this->faker->text(255),
            'tags' => [],
            'source' => $this->faker->text(255),
            'nib' => $this->faker->text(255),
            'npwp' => $this->faker->text(255),
            'no_akta' => $this->faker->text(255),
            'siup' => $this->faker->text(255),
            'other_certifications' => [],
            'user_id' => \App\Models\User::factory(),
            'number_of_employee_id' => \App\Models\NumberOfEmployee::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
