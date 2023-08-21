<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Company;
use App\Models\NumberOfEmployee;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfEmployeeCompaniesTest extends TestCase
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
    public function it_gets_number_of_employee_companies(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();
        $companies = Company::factory()
            ->count(2)
            ->create([
                'number_of_employee_id' => $numberOfEmployee->id,
            ]);

        $response = $this->getJson(
            route('api.number-of-employees.companies.index', $numberOfEmployee)
        );

        $response->assertOk()->assertSee($companies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_number_of_employee_companies(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();
        $data = Company::factory()
            ->make([
                'number_of_employee_id' => $numberOfEmployee->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.number-of-employees.companies.store', $numberOfEmployee),
            $data
        );

        $this->assertDatabaseHas('companies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $company = Company::latest('id')->first();

        $this->assertEquals(
            $numberOfEmployee->id,
            $company->number_of_employee_id
        );
    }
}
