<?php

namespace Database\Factories;

use App\Models\Local;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
protected $model = Local::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'city' => $this->faker->city(),
            'state' => $this->faker->randomElement([
                'São Paulo', 'Rio de Janeiro', 'Minas Gerais', 'Bahia', 'Paraná',
            ]),
        ];
    }
}
