<?php

namespace App\Http\Controllers;

use App\Models\Category;



class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index')->with(['arts' => $category->getByCategory()]);
    }
}