<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function Quiz(){
        return view('layouts.quiz-layout');
    }
}
