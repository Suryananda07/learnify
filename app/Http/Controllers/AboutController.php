<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About(){
        $totalUser = User::where('role', 'user')->count();
        $totalCategory = Category::count();
        $totalCourse = Course::count();
        return view('about-us', compact('totalUser', 'totalCategory', 'totalCourse'));
    }
}
