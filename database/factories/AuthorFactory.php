<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surname' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'patronymic' => ucfirst($this->faker->word),
            'country' => $this->faker->country,
            'birthday' => $this->faker->date('Y-m-d'),
        ];
    }
}
