<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\NumberOfEmployee;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfEmployeeTest extends TestCase
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
    public function it_gets_number_of_employees_list(): void
    {
        $numberOfEmployees = NumberOfEmployee::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.number-of-employees.index'));

        $response->assertOk()->assertSee($numberOfEmployees[0]->label);
    }

    /**
     * @test
     */
    public function it_stores_the_number_of_employee(): void
    {
        $data = NumberOfEmployee::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.number-of-employees.store'),
            $data
        );

        $this->assertDatabaseHas('number_of_employees', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_number_of_employee(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();

        $data = [
            'label' => $this->faker->word(),
            'min' => $this->faker->numberBetween(0, 32767),
            'max' => $this->faker->numberBetween(0, 32767),
        ];

        $response = $this->putJson(
            route('api.number-of-employees.update', $numberOfEmployee),
            $data
        );

        $data['id'] = $numberOfEmployee->id;

        $this->assertDatabaseHas('number_of_employees', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_number_of_employee(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();

        $response = $this->deleteJson(
            route('api.number-of-employees.destroy', $numberOfEmployee)
        );

        $this->assertModelMissing($numberOfEmployee);

        $response->assertNoContent();
    }
}
