<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Training;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingControllerTest extends TestCase
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
    public function it_displays_index_view_with_trainings(): void
    {
        $trainings = Training::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('trainings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.trainings.index')
            ->assertViewHas('trainings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_training(): void
    {
        $response = $this->get(route('trainings.create'));

        $response->assertOk()->assertViewIs('app.trainings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_training(): void
    {
        $data = Training::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('trainings.store'), $data);

        $this->assertDatabaseHas('trainings', $data);

        $training = Training::latest('id')->first();

        $response->assertRedirect(route('trainings.edit', $training));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_training(): void
    {
        $training = Training::factory()->create();

        $response = $this->get(route('trainings.show', $training));

        $response
            ->assertOk()
            ->assertViewIs('app.trainings.show')
            ->assertViewHas('training');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_training(): void
    {
        $training = Training::factory()->create();

        $response = $this->get(route('trainings.edit', $training));

        $response
            ->assertOk()
            ->assertViewIs('app.trainings.edit')
            ->assertViewHas('training');
    }

    /**
     * @test
     */
    public function it_updates_the_training(): void
    {
        $training = Training::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'batch' => $this->faker->text(255),
            'details' => $this->faker->text(),
            'sylabus' => $this->faker->text(255),
            'paper' => $this->faker->text(255),
            'instructor' => $this->faker->text(255),
        ];

        $response = $this->put(route('trainings.update', $training), $data);

        $data['id'] = $training->id;

        $this->assertDatabaseHas('trainings', $data);

        $response->assertRedirect(route('trainings.edit', $training));
    }

    /**
     * @test
     */
    public function it_deletes_the_training(): void
    {
        $training = Training::factory()->create();

        $response = $this->delete(route('trainings.destroy', $training));

        $response->assertRedirect(route('trainings.index'));

        $this->assertModelMissing($training);
    }
}
