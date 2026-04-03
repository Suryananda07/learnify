<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $totalAdmin = User::where('role', 'admin')->count();
        $totalUser = User::where('role', 'user')->count();
        $totalCourse = Course::count();
        $courses = Course::limit(6)->get();

        return view('home', compact('courses', 'totalUser', 'totalAdmin', 'totalCourse'));
    }
}
