<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'batch' => $this->faker->text(255),
            'details' => $this->faker->text(),
            'sylabus' => $this->faker->text(255),
            'paper' => $this->faker->text(255),
            'instructor' => $this->faker->text(255),
        ];
    }
}
