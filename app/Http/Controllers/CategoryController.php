<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $projects = $category->projects;
        $categories = Category::all();

        return view('home', compact('projects', 'categories'));
    }
}
