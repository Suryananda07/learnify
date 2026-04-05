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
        $view = $request->view;
        $search = $request->search;

        $query = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                    $q->orWhere('email', 'like', "%{$search}%");
                    $q->orWhere('role', 'like', "%{$search}%");
                });
            })
            ->when($role && $role !== 'allUser', function ($query) use ($role) {
                $query->where('role', $role);
            });
            $allUsers = $view === 'all' 
            ? $query->get()
            : $query->take(5)->get();

        return view('admin.admin-user', compact('allUsers'));
    }

    public function userEdit(User $user){
        return view('admin.admin-user-edit', compact('user'));
    }

    public function adminCourse(){
        $courses = Course::paginate(6);
        return view('admin.admin-course', compact('courses'));
    }

    public function showCourse(Course $course){
        return view('admin.admin-course-show');
    }

    public function adminCourseAdd(){
        return view('admin.admin-course-add');
    }

    public function adminCourseEdit(){
        return view('admin.admin-course-edit');
    }

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
