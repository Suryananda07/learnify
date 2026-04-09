<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function showCategory(){
        $categories = Category::withCount('Courses')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function Category(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:100|unique:categories,name'
        ]);

        Category::create($validated);

        return redirect(route('category'));
    }
}
