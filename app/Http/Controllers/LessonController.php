<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function Lesson(Course $course){
        $topics = $course->topics;
        return view('layouts.lesson-layout', compact('course', 'topics'));
    }
}
