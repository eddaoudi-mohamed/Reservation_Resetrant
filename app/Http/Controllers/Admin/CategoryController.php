<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::all();
        return view("Admin.Category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "string",
            "description" => "string",
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        // $path = $request->image->path();

        $path = $request->file('image')->store('images', 'public');
        // Storage::disk('local')->put('public/images', $request->file('image'));

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        // Gate::allows()



        // return redirect("admin/categories")->back()->with('success', 'File Upload Successfully!!'); 
        return redirect()->route("admin.categories.index")->with("success", 'category created successfuly ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category =  Category::findOrFail($id);
        return view('Admin.Category.edite', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request->validate([
            "name" => "string",
            "description" => "string",
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
        $category =  Category::findOrFail($id);
        if ($request->hasFile('image')) {
            if (Storage::exists("public/" . $category->image)) {
                Storage::delete("public/" . $category->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }

        $category->update($data);
        return redirect()->route("admin.categories.index")->with("success", 'category updated successfuly ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category =  Category::findOrFail($id);
        if (Storage::exists("public/" . $category->image)) {
            Storage::delete("public/" . $category->image);
        }
        $category->delete();
        return redirect()->route("admin.categories.index")->with("success", 'category deleted successfuly ');
    }
}
