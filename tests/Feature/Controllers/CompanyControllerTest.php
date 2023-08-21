<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Company;

use App\Models\Category;
use App\Models\NumberOfEmployee;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_companies(): void
    {
        $companies = Company::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('companies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.index')
            ->assertViewHas('companies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_company(): void
    {
        $response = $this->get(route('companies.create'));

        $response->assertOk()->assertViewIs('app.companies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_company(): void
    {
        $data = Company::factory()
            ->make()
            ->toArray();

        $data['tags'] = json_encode($data['tags']);
        $data['other_certifications'] = json_encode(
            $data['other_certifications']
        );

        $response = $this->post(route('companies.store'), $data);

        $data['tags'] = $this->castToJson($data['tags']);
        $data['other_certifications'] = $this->castToJson(
            $data['other_certifications']
        );

        $this->assertDatabaseHas('companies', $data);

        $company = Company::latest('id')->first();

        $response->assertRedirect(route('companies.edit', $company));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_company(): void
    {
        $company = Company::factory()->create();

        $response = $this->get(route('companies.show', $company));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.show')
            ->assertViewHas('company');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_company(): void
    {
        $company = Company::factory()->create();

        $response = $this->get(route('companies.edit', $company));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.edit')
            ->assertViewHas('company');
    }

    /**
     * @test
     */
    public function it_updates_the_company(): void
    {
        $company = Company::factory()->create();

        $user = User::factory()->create();
        $numberOfEmployee = NumberOfEmployee::factory()->create();
        $category = Category::factory()->create();

        $data = [
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
            'user_id' => $user->id,
            'number_of_employee_id' => $numberOfEmployee->id,
            'category_id' => $category->id,
        ];

        $data['tags'] = json_encode($data['tags']);
        $data['other_certifications'] = json_encode(
            $data['other_certifications']
        );

        $response = $this->put(route('companies.update', $company), $data);

        $data['id'] = $company->id;

        $data['tags'] = $this->castToJson($data['tags']);
        $data['other_certifications'] = $this->castToJson(
            $data['other_certifications']
        );

        $this->assertDatabaseHas('companies', $data);

        $response->assertRedirect(route('companies.edit', $company));
    }

    /**
     * @test
     */
    public function it_deletes_the_company(): void
    {
        $company = Company::factory()->create();

        $response = $this->delete(route('companies.destroy', $company));

        $response->assertRedirect(route('companies.index'));

        $this->assertModelMissing($company);
    }
}
