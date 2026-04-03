<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\QuizQuestion;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(10)->create();

        foreach($courses as $course){
            $jumlah = rand(1,5);
            $huruf = ['a', 'b', 'c', 'd'];
            $randomHuruf = $huruf[array_rand($huruf)];
            for($i = 1; $i <= $jumlah; $i++){
                Topic::create([
                    'title' => fake()->catchPhrase(),
                    'content' => fake()->sentence(2),
                    'course_id' => $course->id,
                    'order' => $i
                ]);
                QuizQuestion::create([
                    'question' => fake()->text(50),
                    'option_a' => fake()->sentence(2),
                    'option_b' => fake()->sentence(2),
                    'option_c' => fake()->sentence(2),
                    'option_d' => fake()->sentence(2),
                    'correct_answer' => $randomHuruf,
                    'course_id' => $course->id,
                    'order' => $i
                ]);
            }
        }
    }
}
