<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::latest()->get();
        $courses = Course::paginate(6);
        return view('admin.course-info.index', compact('courses', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.course-info.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'tips' => 'required',
        'image' => 'required|image|max:10240',
        'url_video' => 'required|url',
        'duration_video' => 'required|integer',
        'duration_lesson' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'title_topic' => 'required|array|min:1',
        'title_topic.*' => 'required|string',
        'content_topic' => 'required|array|min:1',
        'content_topic.*' => 'required|string',
        'questions' => 'required|array|min:1',
        'questions.*.question' => 'required|string',
        'questions.*.options' => 'required|array|size:4',
        'questions.*.options.*' => 'required|string',
        'questions.*.correct' => 'required|integer|min:0|max:3',
    ]);

    DB::transaction(function () use ($request, $validated) {

        $validated['image'] = $request->file('image')->store('course_images', 'public');

        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tips' => $validated['tips'],
            'image' => $validated['image'],
            'url_video' => $validated['url_video'],
            'duration_video' => $validated['duration_video'],
            'duration_lesson' => $validated['duration_lesson'],
            'category_id' => $validated['category_id'],
            'user_id' => auth()->id(),
        ]);

        foreach ($validated['title_topic'] as $index => $title) {
            $course->topics()->create([
                'title' => $title,
                'content' => $validated['content_topic'][$index] ?? '',
                'order' => $index,
            ]);
        }

        foreach ($validated['questions'] as $index => $q) {
            $course->quizQuestions()->create([
                'question' => $q['question'],
                'option_a' => $q['options'][0],
                'option_b' => $q['options'][1],
                'option_c' => $q['options'][2],
                'option_d' => $q['options'][3],
                'correct_answer' => (int) $q['correct'],
                'order' => $index,
            ]);
        }
    });

    return redirect(route('courses.index'));
}

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $topics = Topic::where('course_id', $course->id)->get();
        return view('admin.course-info.show', compact('course', 'topics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::latest()->get();
        return view('admin.course-info.edit', compact('categories', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'tips' => 'required',
        'image' => 'nullable|image|max:10240',
        'url_video' => 'required|url',
        'duration_video' => 'required|integer',
        'duration_lesson' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'title_topic' => 'required|array|min:1',
        'title_topic.*' => 'required|string',
        'content_topic' => 'required|array|min:1',
        'content_topic.*' => 'required|string',
        'questions' => 'required|array|min:1',
        'questions.*.question' => 'required|string',
        'questions.*.options' => 'required|array|size:4',
        'questions.*.options.*' => 'required|string',
        'questions.*.correct' => 'required|integer|min:0|max:3',
    ]);

    DB::transaction(function () use ($request, $validated, $course) {

        if($request->hasFile('image')){
            if($course->image){
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('course_images', 'public');
        }

        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tips' => $validated['tips'],
            'image' => $validated['image'] ?? $course->image,
            'url_video' => $validated['url_video'],
            'duration_video' => $validated['duration_video'],
            'duration_lesson' => $validated['duration_lesson'],
            'category_id' => $validated['category_id'],
        ]);

        $course->topics()->delete();
        foreach ($validated['title_topic'] as $index => $title) {
            $course->topics()->create([
                'title' => $title,
                'content' => $validated['content_topic'][$index] ?? '',
                'order' => $index,
            ]);
        }

        $course->quizQuestions()->delete();
        foreach ($validated['questions'] as $index => $q) {
            $course->quizQuestions()->create([
                'question' => $q['question'],
                'option_a' => $q['options'][0],
                'option_b' => $q['options'][1],
                'option_c' => $q['options'][2],
                'option_d' => $q['options'][3],
                'correct_answer' => (int) $q['correct'],
                'order' => $index,
            ]);
        }
    });

    return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if($course->image){
            storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect(route('courses.index'));
    }
}
