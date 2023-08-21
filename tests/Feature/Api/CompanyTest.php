<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Company;

use App\Models\Category;
use App\Models\NumberOfEmployee;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_companies_list(): void
    {
        $companies = Company::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.companies.index'));

        $response->assertOk()->assertSee($companies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_company(): void
    {
        $data = Company::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.companies.store'), $data);

        $this->assertDatabaseHas('companies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.companies.update', $company),
            $data
        );

        $data['id'] = $company->id;

        $this->assertDatabaseHas('companies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_company(): void
    {
        $company = Company::factory()->create();

        $response = $this->deleteJson(route('api.companies.destroy', $company));

        $this->assertModelMissing($company);

        $response->assertNoContent();
    }
}
