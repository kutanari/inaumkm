<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\NumberOfEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberOfEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NumberOfEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->word(),
            'min' => $this->faker->numberBetween(0, 32767),
            'max' => $this->faker->numberBetween(0, 32767),
        ];
    }
}
