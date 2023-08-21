<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\NumberOfEmployee;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfEmployeeControllerTest extends TestCase
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

    /**
     * @test
     */
    public function it_displays_index_view_with_number_of_employees(): void
    {
        $numberOfEmployees = NumberOfEmployee::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('number-of-employees.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.number_of_employees.index')
            ->assertViewHas('numberOfEmployees');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_number_of_employee(): void
    {
        $response = $this->get(route('number-of-employees.create'));

        $response->assertOk()->assertViewIs('app.number_of_employees.create');
    }

    /**
     * @test
     */
    public function it_stores_the_number_of_employee(): void
    {
        $data = NumberOfEmployee::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('number-of-employees.store'), $data);

        $this->assertDatabaseHas('number_of_employees', $data);

        $numberOfEmployee = NumberOfEmployee::latest('id')->first();

        $response->assertRedirect(
            route('number-of-employees.edit', $numberOfEmployee)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_number_of_employee(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();

        $response = $this->get(
            route('number-of-employees.show', $numberOfEmployee)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.number_of_employees.show')
            ->assertViewHas('numberOfEmployee');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_number_of_employee(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();

        $response = $this->get(
            route('number-of-employees.edit', $numberOfEmployee)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.number_of_employees.edit')
            ->assertViewHas('numberOfEmployee');
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

        $response = $this->put(
            route('number-of-employees.update', $numberOfEmployee),
            $data
        );

        $data['id'] = $numberOfEmployee->id;

        $this->assertDatabaseHas('number_of_employees', $data);

        $response->assertRedirect(
            route('number-of-employees.edit', $numberOfEmployee)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_number_of_employee(): void
    {
        $numberOfEmployee = NumberOfEmployee::factory()->create();

        $response = $this->delete(
            route('number-of-employees.destroy', $numberOfEmployee)
        );

        $response->assertRedirect(route('number-of-employees.index'));

        $this->assertModelMissing($numberOfEmployee);
    }
}
