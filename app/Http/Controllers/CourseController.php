<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function Course(Request $request){
        $category = $request->category;
        $search = $request->search;
        $categories = Category::all();

        $courses = Course::query()
        ->when($search, function($query) use ($search){
            $query->where(function($q) use ($search){
                $q->where('title', 'like', "%{$search}%");
            });
        })
        ->when($category && $category !== 'allCategory', function ($query) use ($category) {
            $query->whereHas('category', function($q) use($category){
                $q->where('name', $category);
            });
        })
        ->paginate(9);
        return view('course', compact('courses', 'categories'));
    }
}
