<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function Quiz(Course $course){
        return view('layouts.quiz-layout', compact('course'));
    }
}
