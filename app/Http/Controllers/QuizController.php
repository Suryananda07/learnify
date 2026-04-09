<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function quizShow(Course $course){ $questions = QuizQuestion::where('course_id', $course->id)->get(); return view('layouts.quiz-layout', compact('course', 'questions')); } public function quiz(Request $request, Course $course){ $validated = $request->validate([ 'answers' => 'required|array|min:1', 'answers.*' => 'required|integer|between:0,3' ]); $questions = QuizQuestion::where('course_id', $course->id)->get(); $score = 0; $totalQuestions = $questions->count(); foreach($questions as $question){ $userAnswer = $validated['answers'][$question->id] ?? null; if($userAnswer !== null && $userAnswer == $question->correct_answer){ $score++; } } $percentage = ($score / $totalQuestions) * 100; QuizResult::create([ 'score' => $percentage, 'answers' => $validated['answers'], 'user_id' => auth()->id(), 'course_id' => $course->id ]); return redirect(route('score', $course->id)); } public function score(Course $course){ $result = QuizResult::where('user_id', auth()->id()) ->where('course_id', $course->id)->latest()->first(); return view('score', ['percentage' => round($result->score, 2)], compact('course')); }

    public function quizPreview(Course $course){
    $questions = QuizQuestion::where('course_id', $course->id)->get();

    $quizResult = QuizResult::where('user_id', auth()->id())
        ->where('course_id', $course->id)
        ->latest()
        ->first();

    $results = [];

    if ($quizResult) {
        $answers = $quizResult->answers;

        foreach ($questions as $question) {
            $userAnswer = $answers[$question->id] ?? null;

            $isCorrect = $userAnswer !== null && $userAnswer == $question->correct_answer;

            $results[$question->id] = [
                'user_answer' => $userAnswer,
                'correct_answer' => $question->correct_answer,
                'is_correct' => $isCorrect
            ];
        }
    }

    return view('quiz-preview', compact('course', 'questions', 'results'));
}
}
