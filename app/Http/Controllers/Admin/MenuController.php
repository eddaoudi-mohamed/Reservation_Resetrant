<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view("Admin.Menu.index", compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("Admin.Menu.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            "price" => "required|numeric|min:0",
        ]);
        // $path = $request->image->path();


        $path = $request->file('image')->store('images', 'public');
        $validationData["image"] = $path;

        //save data
        $menu =  Menu::create($validationData);
        if ($request->has("categories")) {
            $menu->categories()->attach($request->categories);
        }
        return redirect()->route("admin.menus.index")->with("success", "menu created successfuly");
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
        $menu =  Menu::findOrFail($id);
        $categories = Category::all();

        return view("Admin.Menu.edite", compact("menu", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationData = $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            "price" => "required|numeric|min:0"
        ]);
        $menu = Menu::findOrFail($id);
        if ($request->hasFile("image")) {
            if (Storage::exists("public/" . $menu->image)) {
                Storage::delete("public/" . $menu->image);
                $path = $request->file('image')->store('images', 'public');
                $validationData["image"] = $path;
            }
        }
        $menu->update($validationData);
        if ($request->has("categories")) {
            $menu->categories()->sync($request->categories);
        }
        return redirect()->route("admin.menus.index")->with("success", "menu update successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        if (Storage::exists("public/" . $menu->image)) {
            Storage::delete("public/" . $menu->image);
        }
        $menu->delete();
        return redirect()->route("admin.menus.index")->with("success", "menu deleted successfuly");
    }
}
