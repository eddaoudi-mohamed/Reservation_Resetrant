<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', compact("categories"));
    }


    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view("Categories.show", compact('category'));
    }
}
