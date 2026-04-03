<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function User(Request $request)
{
    $role = $request->role;
    $search = $request->search;

    $allUsers = User::query()
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
                $q->orWhere('email', 'like', "%{$search}%");
                $q->orWhere('role', 'like', "%{$search}%");
            });
        })
        ->when($role && $role !== 'allUser', function ($query) use ($role) {
            $query->where('role', $role);
        })
        ->paginate(5);

    return view('admin.user', compact('allUsers'));
}

    public function adminCourse(){
        $courses = Course::paginate(6);
        return view('admin.admin-course', compact('courses'));
    }

    public function adminCourseAdd(){
        return view('admin.admin-course-add');
    }

    public function adminCourseEdit(){
        return view('admin.admin-course-edit');
    }

public function adminDashboard(){
    $users = User::paginate(5);
    $totalUsers = User::count();
    $totalCourses = Course::count();
    $totalCategories = Category::count();
    return view('admin.dashboard', compact('users', 'totalUsers' , 'totalCourses', 'totalCategories'));
    }
}
