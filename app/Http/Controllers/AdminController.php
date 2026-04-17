<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

public function adminDashboard(Request $request){
    $totalUsers = User::count();
    $totalCourses = Course::count();
    $totalCategories = Category::count();
    $role = $request->role;
    $view = $request->view;

    $query = User::query()
    ->when($role && $role !== 'allUser', function($query) use ($role){
        $query->where('role', $role);
    });
    $allUsers = $view === 'all'
    ? $query->get()
    : $query->take(5)->get();

    return view('admin.dashboard', compact('totalUsers' , 'totalCourses', 'totalCategories', 'allUsers'));
    }
}
