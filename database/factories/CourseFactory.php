<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->catchPhrase(),
            'description' => fake()->paragraph(5),
            'tips' => fake()->paragraph(5),
            'url_video' => fake()->imageUrl(800,800, 'tecnology'),
            'user_id' => User::where('role', 'admin')->inRandomOrder()->value('id') ?? User::factory()->create(['role' => 'admin' ])->id,
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()
        ];
    }
}
