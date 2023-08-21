<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Company;
use App\Models\Training;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingCompaniesTest extends TestCase
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
    public function it_gets_training_companies(): void
    {
        $training = Training::factory()->create();
        $company = Company::factory()->create();

        $training->companies()->attach($company);

        $response = $this->getJson(
            route('api.trainings.companies.index', $training)
        );

        $response->assertOk()->assertSee($company->name);
    }

    /**
     * @test
     */
    public function it_can_attach_companies_to_training(): void
    {
        $training = Training::factory()->create();
        $company = Company::factory()->create();

        $response = $this->postJson(
            route('api.trainings.companies.store', [$training, $company])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $training
                ->companies()
                ->where('companies.id', $company->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_companies_from_training(): void
    {
        $training = Training::factory()->create();
        $company = Company::factory()->create();

        $response = $this->deleteJson(
            route('api.trainings.companies.store', [$training, $company])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $training
                ->companies()
                ->where('companies.id', $company->id)
                ->exists()
        );
    }
}
