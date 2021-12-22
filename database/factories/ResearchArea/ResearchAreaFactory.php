<?php

namespace Database\Factories\ResearchArea;

use App\Models\ResearchArea\ResearchArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResearchAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResearchArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'status' => rand(0, 1),
        ];
    }
}
