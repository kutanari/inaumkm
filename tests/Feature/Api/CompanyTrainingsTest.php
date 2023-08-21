<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Company;
use App\Models\Training;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTrainingsTest extends TestCase
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
    public function it_gets_company_trainings(): void
    {
        $company = Company::factory()->create();
        $training = Training::factory()->create();

        $company->trainings()->attach($training);

        $response = $this->getJson(
            route('api.companies.trainings.index', $company)
        );

        $response->assertOk()->assertSee($training->name);
    }

    /**
     * @test
     */
    public function it_can_attach_trainings_to_company(): void
    {
        $company = Company::factory()->create();
        $training = Training::factory()->create();

        $response = $this->postJson(
            route('api.companies.trainings.store', [$company, $training])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $company
                ->trainings()
                ->where('trainings.id', $training->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_trainings_from_company(): void
    {
        $company = Company::factory()->create();
        $training = Training::factory()->create();

        $response = $this->deleteJson(
            route('api.companies.trainings.store', [$company, $training])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $company
                ->trainings()
                ->where('trainings.id', $training->id)
                ->exists()
        );
    }
}
