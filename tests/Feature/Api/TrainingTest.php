<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Training;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingTest extends TestCase
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
    public function it_gets_trainings_list(): void
    {
        $trainings = Training::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.trainings.index'));

        $response->assertOk()->assertSee($trainings[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_training(): void
    {
        $data = Training::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.trainings.store'), $data);

        $this->assertDatabaseHas('trainings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.trainings.update', $training),
            $data
        );

        $data['id'] = $training->id;

        $this->assertDatabaseHas('trainings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_training(): void
    {
        $training = Training::factory()->create();

        $response = $this->deleteJson(
            route('api.trainings.destroy', $training)
        );

        $this->assertModelMissing($training);

        $response->assertNoContent();
    }
}
