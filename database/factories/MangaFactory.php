<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Manga;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Manga::class;
    public function definition()
    {
        // explode()
        return [
            //
            'title' => fake()->sentence(10),
            'synopsis' => fake()->paragraph(),
            'show' => rand(0,1)
        ];
    }
}
